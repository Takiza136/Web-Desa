<?php

namespace App\Http\Controllers;

use App\Models\ResidentArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function index()
    {
        try {
            $totalPenduduk = ResidentArchive::distinct('nik')->count('nik');
            $totalDokumen = ResidentArchive::count();
            $recentArchives = ResidentArchive::latest()->take(5)->get();
        } catch (\Exception $e) {
            $totalPenduduk = 0;
            $totalDokumen = 0;
            $recentArchives = collect([]);
        }

        return view('archive.index', compact('totalPenduduk', 'totalDokumen', 'recentArchives'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'no_kk' => 'nullable|string|max:16',
            'jenis_dokumen' => 'required|string',
            'nomor_dokumen' => 'required|string|max:255',
            'file_dokumen' => 'required|file|mimes:jpg,jpeg,png,pdf|max:3072', // Max 3MB untuk menjaga performa Vercel Serverless
            'keterangan' => 'nullable|string',
        ], [
            'file_dokumen.required' => 'Unggahan file scan/foto dokumen wajib dilampirkan.',
            'file_dokumen.mimes' => 'Format file harus berupa JPG, JPEG, PNG, atau PDF.',
            'file_dokumen.max' => 'Ukuran maksimal file dokumen adalah 3MB agar proses setor berjalan cepat & lancar.',
            'nik.size' => 'NIK harus berjumlah tepat 16 digit.',
        ]);

        $filePath = null;
        if ($request->hasFile('file_dokumen')) {
            try {
                $file = $request->file('file_dokumen');
                if (env('VERCEL') || config('database.default') !== 'sqlite') {
                    // Untuk lingkungan Vercel/Supabase, simpan langsung sebagai Base64 Data URL di database
                    $mimeType = $file->getMimeType();
                    $base64 = base64_encode(file_get_contents($file->getRealPath()));
                    $filePath = 'data:' . $mimeType . ';base64,' . $base64;
                } else {
                    $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_.-]/', '', $file->getClientOriginalName());
                    $destinationPath = public_path('uploads/archives');
                    if (!file_exists($destinationPath)) {
                        @mkdir($destinationPath, 0755, true);
                    }
                    $file->move($destinationPath, $filename);
                    $filePath = 'uploads/archives/' . $filename;
                }
            } catch (\Exception $e) {
                $filePath = null;
            }
        }

        ResidentArchive::create([
            'nama' => $validated['nama'],
            'nik' => $validated['nik'],
            'no_kk' => $validated['no_kk'] ?? null,
            'jenis_dokumen' => $validated['jenis_dokumen'],
            'nomor_dokumen' => $validated['nomor_dokumen'],
            'file_path' => $filePath,
            'keterangan' => $validated['keterangan'] ?? null,
        ]);

        return back()->with('success', 'Arsip dokumen berhasil disimpan dan tercatat dalam sistem data kependudukan desa.');
    }

    public function adminIndex()
    {
        // Hindari menarik seluruh string Base64 yang besar agar tidak melebihi batas payload Vercel Serverless (4.5MB)
        $archives = ResidentArchive::select(
            'id', 'nama', 'nik', 'no_kk', 'jenis_dokumen', 'nomor_dokumen', 'keterangan', 'created_at',
            DB::raw("CASE WHEN file_path IS NOT NULL AND file_path != '' THEN 1 ELSE 0 END as has_file"),
            DB::raw("SUBSTR(file_path, 1, 30) as file_preview")
        )->latest()->get();

        return view('archive.admin', compact('archives'));
    }

    public function showFile($id)
    {
        $archive = ResidentArchive::findOrFail($id);
        if (!$archive->file_path) {
            abort(404);
        }

        if (str_starts_with($archive->file_path, 'data:')) {
            $parts = explode(';', $archive->file_path);
            $mimeType = str_replace('data:', '', $parts[0]);
            $base64Data = explode(',', $archive->file_path)[1] ?? '';
            $fileData = base64_decode($base64Data);

            return response($fileData)->header('Content-Type', $mimeType);
        }

        return redirect(asset($archive->file_path));
    }

    public function destroy($id)
    {
        $archive = ResidentArchive::findOrFail($id);
        
        if ($archive->file_path && file_exists(public_path($archive->file_path))) {
            @unlink(public_path($archive->file_path));
        }

        $archive->delete();

        return back()->with('success', 'Data arsip kependudukan berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ResidentArchive;
use Illuminate\Http\Request;

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
            'file_dokumen' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120', // Max 5MB
            'keterangan' => 'nullable|string',
        ], [
            'file_dokumen.required' => 'Unggahan file scan/foto dokumen wajib dilampirkan.',
            'file_dokumen.mimes' => 'Format file harus berupa JPG, JPEG, PNG, atau PDF.',
            'file_dokumen.max' => 'Ukuran maksimal file dokumen adalah 5MB.',
            'nik.size' => 'NIK harus berjumlah tepat 16 digit.',
        ]);

        $filePath = null;
        if ($request->hasFile('file_dokumen')) {
            try {
                $file = $request->file('file_dokumen');
                $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_.-]/', '', $file->getClientOriginalName());
                $destinationPath = public_path('uploads/archives');
                if (!file_exists($destinationPath)) {
                    @mkdir($destinationPath, 0755, true);
                }
                $file->move($destinationPath, $filename);
                $filePath = 'uploads/archives/' . $filename;
            } catch (\Exception $e) {
                // Fallback jika sistem file read-only
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
        $archives = ResidentArchive::latest()->get();

        return view('archive.admin', compact('archives'));
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

<?php

namespace App\Http\Controllers;

use App\Models\LetterRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('service.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'jenis_surat' => 'required|string',
            'alasan' => 'required|string',
        ]);

        LetterRequest::create($validated);

        return back()->with('success', 'Permohonan surat berhasil dikirim. Silakan tunggu konfirmasi dari perangkat desa.');
    }
}

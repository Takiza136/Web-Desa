@extends('layouts.app')

@section('title', 'Admin - Daftar Surat Masuk - Desa Pasir Baru')

@section('content')
<!-- Banner Header Admin -->
<div class="bg-slate-100 py-10 border-b border-slate-200 relative overflow-hidden">
    <div class="absolute inset-0 opacity-50 bg-[radial-gradient(#cbd5e1_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-100 border border-green-300/60 text-green-800 text-xs font-semibold tracking-wide uppercase mb-3 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                Panel Administrasi Perangkat Desa
            </div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight sm:text-4xl">Daftar Permohonan Surat</h1>
            <p class="mt-2 text-slate-600 text-base max-w-2xl">Kelola dan periksa seluruh pengajuan surat pengantar yang masuk dari warga desa secara realtime.</p>
        </div>
        <div class="flex items-center gap-4">
            <div class="bg-white border border-slate-200 px-5 py-3 rounded-xl text-center shadow-sm">
                <span class="block text-2xl font-extrabold text-green-600">{{ $requests->count() }}</span>
                <span class="text-xs font-medium text-slate-500">Total Pengajuan</span>
            </div>
            <a href="{{ route('service.index') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white font-bold text-sm transition shadow-md hover:shadow-lg transform active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                Buat Pengajuan Baru
            </a>
        </div>
    </div>

    <!-- Tab Switcher Navigasi Admin -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 mt-8">
        <div class="flex border-b border-slate-300 gap-2">
            <a href="{{ route('admin.service.index') }}" class="px-6 py-3 font-bold text-sm text-green-700 border-b-2 border-green-600 bg-white/60 rounded-t-xl transition flex items-center gap-2 shadow-sm">
                <span>📨</span> Permohonan Surat
            </a>
            <a href="{{ route('admin.archive.index') }}" class="px-6 py-3 font-bold text-sm text-slate-500 hover:text-slate-800 border-b-2 border-transparent hover:border-slate-300 transition flex items-center gap-2">
                <span>🗃️</span> Pengarsipan Data Warga
            </a>
        </div>
    </div>
</div>

<!-- Konten Utama Tabel -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    @if(session('success'))
        <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-200 p-4 flex items-center gap-3 text-emerald-800 shadow-sm animate-fade-in-down">
            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <p class="text-sm font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-50/50">
            <div>
                <h2 class="text-lg font-bold text-slate-800">Arsip Pengajuan Masuk</h2>
                <p class="text-xs text-slate-500 mt-0.5">Daftar diurutkan dari pengajuan paling terbaru</p>
            </div>
            <div class="text-xs text-slate-500 italic">
                * Data sementara tersimpan di sistem (/tmp)
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-100/75 border-b border-slate-200 text-slate-600 text-xs uppercase tracking-wider font-semibold">
                        <th class="py-4 px-6 w-16 text-center">No</th>
                        <th class="py-4 px-6">Waktu Pengajuan</th>
                        <th class="py-4 px-6">Pemohon & NIK</th>
                        <th class="py-4 px-6">Jenis Surat</th>
                        <th class="py-4 px-6">Keperluan / Alasan</th>
                        <th class="py-4 px-6 text-center w-28">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm font-normal">
                    @forelse($requests as $index => $req)
                        <tr class="hover:bg-green-50/40 transition duration-150 group">
                            <td class="py-4 px-6 text-center font-medium text-slate-500">{{ $index + 1 }}</td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="block font-semibold text-slate-700">{{ $req->created_at->format('d M Y') }}</span>
                                <span class="text-xs text-slate-400">{{ $req->created_at->format('H:i') }} WIB</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900 group-hover:text-green-700 transition">{{ $req->nama }}</div>
                                <div class="text-xs font-mono text-slate-500 bg-slate-100 inline-block px-2 py-0.5 rounded mt-1 border border-slate-200">NIK: {{ $req->nik }}</div>
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                @php
                                    $badgeColors = [
                                        'Surat Pengantar Nikah' => 'bg-pink-100 text-pink-800 border-pink-200',
                                        'Surat Keterangan Domisili' => 'bg-blue-100 text-blue-800 border-blue-200',
                                        'Surat Keterangan Tidak Mampu' => 'bg-amber-100 text-amber-800 border-amber-200',
                                        'Surat Keterangan Usaha' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                                        'Surat Pengantar SKCK' => 'bg-purple-100 text-purple-800 border-purple-200',
                                    ];
                                    $colorClass = $badgeColors[$req->jenis_surat] ?? 'bg-indigo-100 text-indigo-800 border-indigo-200';
                                @endphp
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border {{ $colorClass }}">
                                    {{ $req->jenis_surat }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-slate-600 max-w-md line-clamp-2">
                                {{ $req->alasan }}
                            </td>
                            <td class="py-4 px-6 text-center">
                                <form action="{{ route('admin.service.destroy', $req->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data permohonan atas nama {{ $req->nama }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition" title="Hapus Pengajuan">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-16 text-center">
                                <div class="flex flex-col items-center justify-center max-w-sm mx-auto">
                                    <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mb-4">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                    </div>
                                    <h3 class="text-base font-bold text-slate-800">Belum Ada Pengajuan Masuk</h3>
                                    <p class="text-xs text-slate-500 mt-1 text-center">Saat ini belum ada warga yang mengirimkan formulir permohonan surat pengantar.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Pelayanan Administrasi - Desa Pasir Baru')

@section('content')
<div class="bg-green-700 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl">Layanan Administrasi Desa</h1>
        <p class="mt-4 text-xl text-green-100 max-w-2xl mx-auto">Ajukan permohonan surat pengantar dan administrasi lainnya secara digital.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        <!-- Kolom Informasi Panduan -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 sticky top-24">
                <h2 class="text-xl font-bold text-gray-900 mb-4 border-b pb-2">Panduan Pengajuan</h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <div class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-green-100 text-green-600 font-bold text-sm mr-3">1</div>
                        <p class="text-gray-600 text-sm">Isi formulir digital dengan data yang sebenar-benarnya sesuai KTP/KK.</p>
                    </li>
                    <li class="flex items-start">
                        <div class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-green-100 text-green-600 font-bold text-sm mr-3">2</div>
                        <p class="text-gray-600 text-sm">Pilih jenis surat pengantar yang dibutuhkan.</p>
                    </li>
                    <li class="flex items-start">
                        <div class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-green-100 text-green-600 font-bold text-sm mr-3">3</div>
                        <p class="text-gray-600 text-sm">Setelah dikirim, permohonan akan diverifikasi oleh perangkat desa (1x24 jam kerja).</p>
                    </li>
                    <li class="flex items-start">
                        <div class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-green-100 text-green-600 font-bold text-sm mr-3">4</div>
                        <p class="text-gray-600 text-sm">Anda akan dihubungi melalui WhatsApp atau dapat mengambil langsung di Balai Desa dengan membawa fotokopi KK/KTP.</p>
                    </li>
                </ul>
                
                <div class="mt-8 bg-green-50 rounded-lg p-4">
                    <h3 class="font-semibold text-green-800 text-sm mb-1">Jam Operasional Balai Desa:</h3>
                    <p class="text-sm text-green-700">Senin - Jumat: 08.00 - 15.00 WIB</p>
                </div>
            </div>
        </div>

        <!-- Kolom Formulir -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Formulir Pengajuan Surat Pengantar</h2>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 flex items-start" role="alert">
                        <svg class="w-5 h-5 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded mb-6">
                        <ul class="list-disc pl-5 text-sm space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('service.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap (Sesuai KTP) <span class="text-red-500">*</span></label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required class="w-full rounded-md border-gray-300 border p-2.5 focus:border-green-500 focus:ring-green-500 shadow-sm" placeholder="Contoh: Budi Santoso">
                        </div>
                        
                        <div>
                            <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">Nomor Induk Kependudukan (NIK) <span class="text-red-500">*</span></label>
                            <input type="text" name="nik" id="nik" value="{{ old('nik') }}" required minlength="16" maxlength="16" class="w-full rounded-md border-gray-300 border p-2.5 focus:border-green-500 focus:ring-green-500 shadow-sm" placeholder="16 Digit NIK">
                        </div>
                    </div>

                    <div>
                        <label for="jenis_surat" class="block text-sm font-medium text-gray-700 mb-1">Jenis Surat Pengantar <span class="text-red-500">*</span></label>
                        <select id="jenis_surat" name="jenis_surat" required class="w-full rounded-md border-gray-300 border p-2.5 focus:border-green-500 focus:ring-green-500 shadow-sm bg-white">
                            <option value="" disabled {{ old('jenis_surat') ? '' : 'selected' }}>Pilih jenis surat...</option>
                            <option value="Surat Keterangan Domisili" {{ old('jenis_surat') == 'Surat Keterangan Domisili' ? 'selected' : '' }}>Surat Keterangan Domisili</option>
                            <option value="Surat Keterangan Tidak Mampu (SKTM)" {{ old('jenis_surat') == 'Surat Keterangan Tidak Mampu (SKTM)' ? 'selected' : '' }}>Surat Keterangan Tidak Mampu (SKTM)</option>
                            <option value="Surat Pengantar SKCK" {{ old('jenis_surat') == 'Surat Pengantar SKCK' ? 'selected' : '' }}>Surat Pengantar SKCK</option>
                            <option value="Surat Keterangan Usaha" {{ old('jenis_surat') == 'Surat Keterangan Usaha' ? 'selected' : '' }}>Surat Keterangan Usaha</option>
                            <option value="Surat Pengantar Nikah" {{ old('jenis_surat') == 'Surat Pengantar Nikah' ? 'selected' : '' }}>Surat Pengantar Nikah</option>
                            <option value="Lainnya" {{ old('jenis_surat') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label for="alasan" class="block text-sm font-medium text-gray-700 mb-1">Keperluan / Alasan Pembuatan Surat <span class="text-red-500">*</span></label>
                        <textarea id="alasan" name="alasan" rows="4" required class="w-full rounded-md border-gray-300 border p-2.5 focus:border-green-500 focus:ring-green-500 shadow-sm" placeholder="Jelaskan secara singkat keperluan surat ini (misal: Untuk persyaratan melamar pekerjaan)">{{ old('alasan') }}</textarea>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-end">
                        <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-green-700 transition shadow-md w-full sm:w-auto">
                            Kirim Permohonan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

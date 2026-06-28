@extends('layouts.app')

@section('title', 'Pengarsipan Data Kependudukan - Desa Pasir Baru')

@section('content')
<!-- Hero Header dengan Rich Gradient -->
<div class="relative bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 py-16 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(99,102,241,0.15),transparent_50%)]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-indigo-500/10 border border-indigo-400/30 text-indigo-300 text-xs font-semibold uppercase tracking-wider mb-4 backdrop-blur-md">
            <svg class="w-4 h-4 text-indigo-400 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Sistem Arsip Digital Terpadu
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">Pengarsipan Data Warga</h1>
        <p class="mt-4 text-lg text-indigo-200 max-w-2xl mx-auto font-normal leading-relaxed">
            Partisipasi digital warga dalam mendata dokumen kependudukan. Data NIK yang terkumpul menjadi penentu langsung jumlah pasti penduduk desa.
        </p>

        <!-- Live Indicator Cards -->
        <div class="mt-10 grid grid-cols-2 max-w-lg mx-auto gap-4">
            <div class="bg-white/5 border border-white/10 rounded-2xl p-4 backdrop-blur-md text-center">
                <div class="text-2xl sm:text-3xl font-extrabold text-indigo-300">{{ number_format($totalPenduduk) }}</div>
                <div class="text-xs font-medium text-slate-400 uppercase tracking-wider mt-1">Penduduk Terverifikasi</div>
            </div>
            <div class="bg-white/5 border border-white/10 rounded-2xl p-4 backdrop-blur-md text-center">
                <div class="text-2xl sm:text-3xl font-extrabold text-emerald-300">{{ number_format($totalDokumen) }}</div>
                <div class="text-xs font-medium text-slate-400 uppercase tracking-wider mt-1">Dokumen Terarsip</div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Form -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        <!-- Sidebar Info & Kerahasiaan -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 p-6 border border-slate-100 sticky top-28">
                <div class="flex items-center gap-3 mb-4 pb-4 border-b border-slate-100">
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-slate-900">Jaminan Kerahasiaan</h2>
                        <p class="text-xs text-slate-500">Privasi Anda Diutamakan</p>
                    </div>
                </div>

                <div class="bg-amber-50 rounded-xl p-4 border border-amber-200/60 mb-6">
                    <p class="text-xs text-amber-800 leading-relaxed font-medium">
                        <strong>Penting:</strong> Seluruh file foto atau scan dokumen yang Anda unggah bersifat <strong>rahasia (private)</strong>. File hasil output tidak ditampilkan ke publik dan hanya dapat diakses serta diverifikasi oleh Kepala Desa & Admin Staf Desa.
                    </p>
                </div>

                <h3 class="text-sm font-bold text-slate-900 mb-3">Tujuan Pengarsipan:</h3>
                <ul class="space-y-3.5 text-xs text-slate-600">
                    <li class="flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-indigo-600 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>Memutakhirkan statistik kependudukan desa secara aktual dan presisi.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-indigo-600 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>Mempercepat pelayanan surat menyurat di balai desa karena arsip digital sudah tersedia.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-indigo-600 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>Mencegah kehilangan atau kerusakan dokumen fisik warga.</span>
                    </li>
                </ul>

                <div class="mt-8 pt-4 border-t border-slate-100 text-center">
                    <p class="text-[11px] text-slate-400">Butuh bantuan pengisian?</p>
                    <a href="https://wa.me/628123456789" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 transition">Hubungi Helpdesk Desa &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Form Card Utama -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 p-8 sm:p-10 border border-slate-100">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Formulir Setor Arsip Dokumen</h2>
                    <p class="text-sm text-slate-500 mt-1">Lengkapi data di bawah ini sesuai dengan dokumen aslinya.</p>
                </div>

                @if(session('success'))
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-xl mb-8 flex items-start shadow-sm" role="alert">
                        <svg class="w-6 h-6 mr-3 text-emerald-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <div class="text-sm font-medium">{{ session('success') }}</div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-rose-50 border border-rose-200 text-rose-700 px-5 py-4 rounded-xl mb-8">
                        <div class="font-bold text-sm mb-1.5 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            Gagal Menyimpan Arsip:
                        </div>
                        <ul class="list-disc pl-5 text-xs space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('archive.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Nama Lengkap (Sesuai KTP) <span class="text-rose-500">*</span></label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required class="w-full rounded-xl border-slate-300 border p-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 shadow-sm transition" placeholder="Contoh: Siti Aminah">
                        </div>
                        
                        <div>
                            <label for="nik" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">NIK Pemilik Dokumen (16 Digit) <span class="text-rose-500">*</span></label>
                            <input type="text" name="nik" id="nik" value="{{ old('nik') }}" required minlength="16" maxlength="16" class="w-full rounded-xl border-slate-300 border p-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 shadow-sm transition font-mono" placeholder="3201xxxxxxxxxxxx">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="jenis_dokumen" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Jenis Dokumen <span class="text-rose-500">*</span></label>
                            <select id="jenis_dokumen" name="jenis_dokumen" required class="w-full rounded-xl border-slate-300 border p-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 shadow-sm transition bg-white">
                                <option value="" disabled {{ old('jenis_dokumen') ? '' : 'selected' }}>Pilih jenis dokumen...</option>
                                <option value="Kartu Keluarga (KK)" {{ old('jenis_dokumen') == 'Kartu Keluarga (KK)' ? 'selected' : '' }}>Kartu Keluarga (KK)</option>
                                <option value="Akte Kelahiran" {{ old('jenis_dokumen') == 'Akte Kelahiran' ? 'selected' : '' }}>Akte Kelahiran</option>
                                <option value="KTP Warga" {{ old('jenis_dokumen') == 'KTP Warga' ? 'selected' : '' }}>KTP Warga</option>
                                <option value="Buku Nikah / Akte Perkawinan" {{ old('jenis_dokumen') == 'Buku Nikah / Akte Perkawinan' ? 'selected' : '' }}>Buku Nikah / Akte Perkawinan</option>
                                <option value="Ijazah Terakhir" {{ old('jenis_dokumen') == 'Ijazah Terakhir' ? 'selected' : '' }}>Ijazah Terakhir</option>
                                <option value="Surat Pindah Domisili" {{ old('jenis_dokumen') == 'Surat Pindah Domisili' ? 'selected' : '' }}>Surat Pindah Domisili</option>
                                <option value="Dokumen Kependudukan Lainnya" {{ old('jenis_dokumen') == 'Dokumen Kependudukan Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label for="nomor_dokumen" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Nomor Dokumen / Akte <span class="text-rose-500">*</span></label>
                            <input type="text" name="nomor_dokumen" id="nomor_dokumen" value="{{ old('nomor_dokumen') }}" required class="w-full rounded-xl border-slate-300 border p-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 shadow-sm transition font-mono" placeholder="No. Seri / No. KK / No. Akte">
                        </div>
                    </div>

                    <div>
                        <label for="no_kk" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Nomor Kartu Keluarga / KK (Opsional)</label>
                        <input type="text" name="no_kk" id="no_kk" value="{{ old('no_kk') }}" minlength="16" maxlength="16" class="w-full rounded-xl border-slate-300 border p-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 shadow-sm transition font-mono" placeholder="Diisi jika dokumen terkait dengan KK keluarga">
                        <span class="text-[11px] text-slate-400 mt-1 block">*Membantu sistem menghitung jumlah total Kepala Keluarga di desa.</span>
                    </div>

                    <!-- Upload Box -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Unggah Foto / Scan Dokumen <span class="text-rose-500">*</span></label>
                        <div id="dropzone-container" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-xl hover:border-indigo-400 transition bg-slate-50/50 group relative overflow-hidden">
                            <!-- Default State -->
                            <div id="default-upload-state" class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-400 group-hover:text-indigo-500 transition" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-slate-600 justify-center">
                                    <label for="file_dokumen" class="relative cursor-pointer rounded-md font-bold text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                        <span>Pilih file dari perangkat</span>
                                        <input id="file_dokumen" name="file_dokumen" type="file" required accept=".jpg,.jpeg,.png,.pdf" class="sr-only">
                                    </label>
                                </div>
                                <p class="text-xs text-slate-500">Format JPG, PNG, atau PDF (Maksimal 5MB)</p>
                            </div>

                            <!-- Preview State (Hidden by default) -->
                            <div id="preview-upload-state" class="hidden w-full text-center py-2 animate-fade-in-down">
                                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100 border border-emerald-300 text-emerald-800 text-xs font-bold mb-3 shadow-sm">
                                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    File Berhasil Dipilih!
                                </div>
                                <div id="preview-image-wrapper" class="mb-3 hidden justify-center">
                                    <img id="preview-image" src="" alt="Preview Dokumen" class="max-h-48 rounded-lg border-2 border-indigo-200 shadow-md object-contain mx-auto">
                                </div>
                                <div id="preview-pdf-wrapper" class="mb-3 hidden justify-center items-center gap-2 p-4 bg-indigo-50/80 rounded-xl border border-indigo-200 max-w-sm mx-auto">
                                    <span class="text-3xl">📄</span>
                                    <div class="text-left overflow-hidden">
                                        <div class="font-bold text-slate-800 text-sm truncate" id="pdf-filename">Dokumen.pdf</div>
                                        <div class="text-xs text-indigo-600 font-semibold">Siap dilampirkan</div>
                                    </div>
                                </div>
                                <div class="text-sm font-bold text-slate-800" id="preview-file-name">filename.jpg</div>
                                <div class="text-xs text-slate-500 mb-3" id="preview-file-size">2.4 MB</div>
                                <label for="file_dokumen" class="inline-block cursor-pointer px-4 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-bold transition shadow-sm">
                                    🔄 Ganti File Lain
                                </label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="keterangan" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Keterangan / Catatan Tambahan (Opsional)</label>
                        <textarea id="keterangan" name="keterangan" rows="3" class="w-full rounded-xl border-slate-300 border p-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 shadow-sm transition" placeholder="Misal: Akte asli sedang disimpan di lemari keluarga">{{ old('keterangan') }}</textarea>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-end">
                        <button type="submit" class="bg-indigo-600 text-white px-8 py-3.5 rounded-xl font-bold hover:bg-indigo-700 active:scale-[0.99] transition shadow-lg shadow-indigo-600/25 w-full sm:w-auto flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                            Setor Arsip Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('file_dokumen');
    const defaultState = document.getElementById('default-upload-state');
    const previewState = document.getElementById('preview-upload-state');
    const previewImgWrapper = document.getElementById('preview-image-wrapper');
    const previewImg = document.getElementById('preview-image');
    const previewPdfWrapper = document.getElementById('preview-pdf-wrapper');
    const pdfFilename = document.getElementById('pdf-filename');
    const fileName = document.getElementById('preview-file-name');
    const fileSize = document.getElementById('preview-file-size');

    fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            if (file.size > 3 * 1024 * 1024) {
                alert('⚠️ Ukuran file Anda (' + (file.size / (1024 * 1024)).toFixed(2) + ' MB) melebihi batas maksimal 3 MB. Silakan kompres atau pilih file yang lebih kecil agar tidak gagal saat dikirim.');
                this.value = '';
                defaultState.classList.remove('hidden');
                previewState.classList.add('hidden');
                return;
            }

            fileName.textContent = file.name;
            
            // Format ukuran file
            const sizeInKB = (file.size / 1024).toFixed(1);
            const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
            fileSize.textContent = file.size > 1024 * 1024 ? `${sizeInMB} MB` : `${sizeInKB} KB`;

            defaultState.classList.add('hidden');
            previewState.classList.remove('hidden');

            if (file.type.startsWith('image/')) {
                previewPdfWrapper.classList.add('hidden');
                previewImgWrapper.classList.remove('hidden');
                previewImgWrapper.classList.add('flex');
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                previewImgWrapper.classList.add('hidden');
                previewImgWrapper.classList.remove('flex');
                previewPdfWrapper.classList.remove('hidden');
                previewPdfWrapper.classList.add('flex');
                pdfFilename.textContent = file.name;
            }
        } else {
            defaultState.classList.remove('hidden');
            previewState.classList.add('hidden');
        }
    });
});
</script>
@endsection

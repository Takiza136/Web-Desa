@extends('layouts.app')

@section('title', 'Profil Desa - Desa Pasir Baru')

@section('content')
<div class="bg-green-700 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl">Profil Desa Pasir Baru</h1>
        <p class="mt-4 text-xl text-green-100 max-w-2xl mx-auto">Mengenal lebih dekat sejarah, visi, misi, dan struktur pemerintahan Desa Pasir Baru.</p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Sejarah -->
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-900 border-b-2 border-green-500 pb-2 mb-6 inline-block">Sejarah Desa</h2>
        <div class="prose prose-lg text-gray-600 max-w-none">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            <p>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
        </div>
    </section>

    <!-- Visi & Misi -->
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-900 border-b-2 border-green-500 pb-2 mb-6 inline-block">Visi & Misi</h2>
        
        <div class="bg-gray-50 rounded-xl p-8 border border-gray-100 mb-8">
            <h3 class="text-xl font-semibold text-center text-green-700 mb-4">"Visi"</h3>
            <p class="text-center text-lg italic text-gray-700 font-medium">"Terwujudnya Desa Pasir Baru yang Mandiri, Sejahtera, Religius, dan Berbudaya berbasis Digital."</p>
        </div>

        <div>
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Misi</h3>
            <ul class="space-y-4">
                <li class="flex items-start">
                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-green-100 text-green-600 font-bold mr-4">1</span>
                    <p class="text-gray-600 text-lg mt-1">Meningkatkan tata kelola pemerintahan desa yang transparan dan akuntabel melalui sistem informasi desa terpadu.</p>
                </li>
                <li class="flex items-start">
                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-green-100 text-green-600 font-bold mr-4">2</span>
                    <p class="text-gray-600 text-lg mt-1">Meningkatkan kualitas pelayanan publik dasar kepada masyarakat dengan memanfaatkan teknologi digital.</p>
                </li>
                <li class="flex items-start">
                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-green-100 text-green-600 font-bold mr-4">3</span>
                    <p class="text-gray-600 text-lg mt-1">Memberdayakan ekonomi kerakyatan melalui pengembangan UMKM dan BUMDes berbasis potensi lokal.</p>
                </li>
                <li class="flex items-start">
                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-green-100 text-green-600 font-bold mr-4">4</span>
                    <p class="text-gray-600 text-lg mt-1">Meningkatkan kualitas infrastruktur desa yang memadai dan berwawasan lingkungan.</p>
                </li>
            </ul>
        </div>
    </section>

    <!-- Struktur Organisasi -->
    <section>
        <h2 class="text-2xl font-bold text-gray-900 border-b-2 border-green-500 pb-2 mb-8 inline-block">Struktur Organisasi Perangkat Desa</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-center">
            <!-- Kades -->
            <div class="col-span-1 md:col-span-2 lg:col-span-3 flex justify-center mb-4">
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 w-full max-w-xs transition-transform hover:-translate-y-1">
                    <div class="w-24 h-24 mx-auto bg-gray-200 rounded-full mb-4 overflow-hidden">
                        <img src="https://i.pravatar.cc/150?img=11" alt="Kepala Desa" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-lg text-gray-900">Budi Santoso</h3>
                    <p class="text-green-600 font-medium">Kepala Desa</p>
                </div>
            </div>

            <!-- Sekdes -->
            <div class="col-span-1 md:col-span-2 lg:col-span-3 flex justify-center mb-4">
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 w-full max-w-xs transition-transform hover:-translate-y-1">
                    <div class="w-24 h-24 mx-auto bg-gray-200 rounded-full mb-4 overflow-hidden">
                        <img src="https://i.pravatar.cc/150?img=12" alt="Sekretaris Desa" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-lg text-gray-900">Siti Aminah</h3>
                    <p class="text-green-600 font-medium">Sekretaris Desa</p>
                </div>
            </div>

            <!-- Kasi/Kaur -->
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 transition-transform hover:-translate-y-1">
                <div class="w-20 h-20 mx-auto bg-gray-200 rounded-full mb-4 overflow-hidden">
                    <img src="https://i.pravatar.cc/150?img=13" alt="Kaur Keuangan" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold text-lg text-gray-900">Ahmad Fauzi</h3>
                <p class="text-green-600 font-medium text-sm">Kaur Keuangan</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 transition-transform hover:-translate-y-1">
                <div class="w-20 h-20 mx-auto bg-gray-200 rounded-full mb-4 overflow-hidden">
                    <img src="https://i.pravatar.cc/150?img=14" alt="Kasi Pemerintahan" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold text-lg text-gray-900">Rina Wati</h3>
                <p class="text-green-600 font-medium text-sm">Kasi Pemerintahan</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 transition-transform hover:-translate-y-1">
                <div class="w-20 h-20 mx-auto bg-gray-200 rounded-full mb-4 overflow-hidden">
                    <img src="https://i.pravatar.cc/150?img=15" alt="Kasi Kesejahteraan" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold text-lg text-gray-900">Joko Anwar</h3>
                <p class="text-green-600 font-medium text-sm">Kasi Kesejahteraan</p>
            </div>
        </div>
    </section>
</div>
@endsection

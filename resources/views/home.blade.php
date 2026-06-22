@extends('layouts.app')

@section('title', 'Beranda - Desa Pasir Baru')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gray-900 h-screen min-h-[600px] max-h-[800px] flex items-center justify-center">
    <!-- Image with dark overlay instead of green mix-blend -->
    <img src="{{ asset('images/balai-desa.png') }}" alt="Pemandangan Desa Pasir Baru" class="absolute inset-0 w-full h-full object-cover opacity-50">
    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto pt-16">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 tracking-wide drop-shadow-lg">Selamat Datang di Desa Pasir Baru</h1>
        <p class="text-xl md:text-2xl text-gray-200 mb-8 drop-shadow-md">Desa Seribu Mata Air</p>
        <div class="flex justify-center">
            <a href="#" class="bg-blue-500 text-white px-8 py-3 rounded text-sm font-bold uppercase tracking-wider hover:bg-blue-600 transition shadow-lg flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                MEDIA SOSIAL DESA PASIR BARU
            </a>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 grid grid-cols-2 md:grid-cols-4 gap-8">
        @foreach($statistics as $stat)
        <div class="text-center">
            <div class="text-4xl mb-2">{{ $stat['icon'] }}</div>
            <div class="text-3xl font-bold text-gray-900">{{ $stat['value'] }}</div>
            <div class="text-sm font-medium text-gray-500 uppercase tracking-wide mt-1">{{ $stat['label'] }}</div>
        </div>
        @endforeach
    </div>
</div>

<!-- Latest News Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex justify-between items-end mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Kabar Desa Terbaru</h2>
            <p class="mt-2 text-gray-600">Informasi dan berita terkini seputar Desa Pasir Baru</p>
        </div>
        <a href="{{ url('/berita') }}" class="hidden sm:inline-flex text-green-600 font-semibold hover:text-green-700 items-center gap-1">
            Lihat Semua Berita
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($latestNews as $news)
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-transform hover:-translate-y-1 hover:shadow-xl">
            @if($news->image_url)
                <img src="{{ $news->image_url }}" alt="{{ $news->title }}" class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
            @endif
            <div class="p-6">
                <div class="text-xs font-semibold text-green-600 mb-2 uppercase tracking-wide">
                    {{ $news->published_at ? $news->published_at->format('d M Y') : 'Baru' }}
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                    <a href="{{ route('news.show', $news->slug) }}" class="hover:text-green-600">{{ $news->title }}</a>
                </h3>
                <p class="text-gray-600 mb-4 line-clamp-3">{{ $news->excerpt }}</p>
                <a href="{{ route('news.show', $news->slug) }}" class="text-green-600 font-medium hover:text-green-800 text-sm flex items-center gap-1">
                    Baca selengkapnya <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12 bg-gray-50 rounded-xl border border-dashed border-gray-300">
            <p class="text-gray-500">Belum ada berita terbaru saat ini.</p>
        </div>
        @endforelse
    </div>
    
    <div class="mt-8 text-center sm:hidden">
        <a href="{{ url('/berita') }}" class="inline-flex text-green-600 font-semibold hover:text-green-700 items-center gap-1 bg-green-50 px-4 py-2 rounded-lg">
            Lihat Semua Berita &rarr;
        </a>
    </div>
</div>
@endsection

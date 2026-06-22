@extends('layouts.app')

@section('title', 'Kabar Desa - Desa Pasir Baru')

@section('content')
<div class="bg-gray-100 py-12 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-gray-900">Kabar Desa</h1>
        <p class="mt-2 text-lg text-gray-600">Berita, pengumuman, dan artikel terbaru seputar kegiatan di Desa Pasir Baru.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($news as $item)
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 flex flex-col transition-transform hover:-translate-y-1 hover:shadow-xl">
            @if($item->image_url)
                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
            @endif
            <div class="p-6 flex-1 flex flex-col">
                <div class="text-xs font-semibold text-green-600 mb-2 uppercase tracking-wide flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $item->published_at ? $item->published_at->format('d F Y') : 'Baru' }}
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                    <a href="{{ route('news.show', $item->slug) }}" class="hover:text-green-600">{{ $item->title }}</a>
                </h2>
                <p class="text-gray-600 mb-4 line-clamp-3 flex-1">{{ $item->excerpt }}</p>
                <div class="mt-auto pt-4 border-t border-gray-100">
                    <a href="{{ route('news.show', $item->slug) }}" class="text-green-600 font-medium hover:text-green-800 text-sm flex items-center gap-1">
                        Baca selengkapnya <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16 bg-white rounded-xl shadow-sm border border-dashed border-gray-300">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-.586-1.414l-4.5-4.5A2 2 0 0012.586 3H12" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada berita</h3>
            <p class="mt-1 text-sm text-gray-500">Nantikan informasi terbaru dari kami.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $news->links('pagination::tailwind') }}
    </div>
</div>
@endsection

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Pasir Baru')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles to prevent layout shifts */
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen text-gray-800">

    <!-- Navbar -->
    <nav class="{{ Request::is('/') ? 'absolute w-full z-50 bg-transparent' : 'bg-gray-900 sticky top-0 z-50' }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-24 border-b border-white border-opacity-20">
                <div class="flex items-center gap-4">
                    <a href="{{ url('/') }}" class="flex items-center gap-4 group">
                        <!-- Placeholder Logo -->
                        <div class="w-12 h-12 bg-transparent border-2 border-blue-400 text-blue-400 flex items-center justify-center rounded-full font-bold text-2xl group-hover:bg-blue-400 group-hover:text-white transition">
                            PB
                        </div>
                        <div>
                            <span class="font-bold text-2xl text-white block drop-shadow-md">Desa Pasir Baru</span>
                            <span class="text-sm text-gray-200 block drop-shadow-md">Official Dialogue Space of Pasir Baru Village</span>
                        </div>
                    </a>
                </div>
                <div class="hidden lg:flex lg:items-center lg:space-x-8">
                    <a href="{{ url('/') }}" class="text-white hover:text-blue-300 px-1 py-2 text-sm font-bold uppercase tracking-wider transition-colors border-b-2 {{ Request::is('/') ? 'border-white' : 'border-transparent' }}">Beranda</a>
                    <a href="{{ url('/berita') }}" class="text-white hover:text-blue-300 px-1 py-2 text-sm font-bold uppercase tracking-wider transition-colors border-b-2 {{ Request::is('berita*') ? 'border-white' : 'border-transparent' }}">Kabar Desa</a>
                    <a href="{{ url('/pelayanan') }}" class="text-white hover:text-blue-300 px-1 py-2 text-sm font-bold uppercase tracking-wider transition-colors border-b-2 {{ Request::is('pelayanan*') ? 'border-white' : 'border-transparent' }}">Pelayanan</a>
                    <a href="{{ url('/profil') }}" class="text-white hover:text-blue-300 px-1 py-2 text-sm font-bold uppercase tracking-wider transition-colors border-b-2 {{ Request::is('profil*') ? 'border-white' : 'border-transparent' }}">Profil Desa</a>

                    @auth
                        <div class="flex items-center pl-4 border-l border-white/20 space-x-4">
                            <a href="{{ route('admin.service.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-green-600 hover:bg-green-500 text-white font-bold text-xs uppercase tracking-wider transition shadow-lg shadow-green-600/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-300 animate-pulse"></span>
                                Panel Admin
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-white/70 hover:text-red-400 font-bold text-xs uppercase tracking-wider transition">Keluar</button>
                            </form>
                        </div>
                    @else
                        <div class="pl-4 border-l border-white/20">
                            <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 bg-white/20 hover:bg-white text-white hover:text-slate-900 px-4 py-2 rounded-xl border border-white/40 text-xs font-bold uppercase tracking-wider transition shadow backdrop-blur-sm">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                Login Staf
                            </a>
                        </div>
                    @endauth
                </div>
                <!-- Mobile menu button -->
                <div class="flex items-center lg:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="lg:hidden hidden bg-gray-900 border-t border-gray-800" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ url('/') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ Request::is('/') ? 'border-blue-500 bg-gray-800 text-white' : 'border-transparent text-gray-300 hover:bg-gray-800 hover:text-white' }} text-base font-medium">Beranda</a>
                <a href="{{ url('/berita') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ Request::is('berita*') ? 'border-blue-500 bg-gray-800 text-white' : 'border-transparent text-gray-300 hover:bg-gray-800 hover:text-white' }} text-base font-medium">Kabar Desa</a>
                <a href="{{ url('/pelayanan') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ Request::is('pelayanan*') ? 'border-blue-500 bg-gray-800 text-white' : 'border-transparent text-gray-300 hover:bg-gray-800 hover:text-white' }} text-base font-medium">Pelayanan</a>
                <a href="{{ url('/profil') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ Request::is('profil*') ? 'border-blue-500 bg-gray-800 text-white' : 'border-transparent text-gray-300 hover:bg-gray-800 hover:text-white' }} text-base font-medium">Profil Desa</a>

                @auth
                    <div class="pt-4 mt-2 border-t border-gray-800 px-3 space-y-2">
                        <a href="{{ route('admin.service.index') }}" class="block text-center px-4 py-2.5 rounded-lg bg-green-600 font-bold text-white text-sm">Panel Admin Staf</a>
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full text-center px-4 py-2 rounded-lg bg-gray-800 text-red-400 font-medium text-sm">Keluar Sistem</button>
                        </form>
                    </div>
                @else
                    <div class="pt-4 mt-2 border-t border-gray-800 px-3">
                        <a href="{{ route('login') }}" class="block text-center px-4 py-2 rounded-lg border border-gray-700 text-gray-300 hover:bg-gray-800 font-medium text-sm">Login Staf Desa</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-auto">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-green-500 text-white flex items-center justify-center rounded-full font-bold">
                            PB
                        </div>
                        <span class="text-xl font-bold">Desa Pasir Baru</span>
                    </div>
                    <p class="text-gray-400 text-sm">
                        Mewujudkan desa digital yang transparan, inovatif, dan berbudaya untuk kesejahteraan seluruh warga.
                    </p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider mb-4 text-green-500">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/') }}" class="text-gray-400 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="{{ url('/berita') }}" class="text-gray-400 hover:text-white transition-colors">Kabar Desa</a></li>
                        <li><a href="{{ url('/pelayanan') }}" class="text-gray-400 hover:text-white transition-colors">Pelayanan Administrasi</a></li>
                        <li><a href="{{ url('/profil') }}" class="text-gray-400 hover:text-white transition-colors">Profil Desa</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider mb-4 text-green-500">Kontak</h3>
                    <ul class="text-gray-400 text-sm space-y-2">
                        <li>Jl. Raya Pasir Baru No. 1</li>
                        <li>Kecamatan Pasir, Kabupaten Baru</li>
                        <li>Email: kontak@pasirbaru.desa.id</li>
                        <li>Telp: (021) 123-4567</li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-800 pt-8 flex items-center justify-center">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} Pemerintah Desa Pasir Baru. Hak Cipta Dilindungi.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>

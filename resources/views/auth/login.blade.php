@extends('layouts.app')

@section('title', 'Login Perangkat Desa - Desa Pasir Baru')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-16 px-4 sm:px-6 lg:px-8 bg-slate-50 relative overflow-hidden">
    <!-- Dekorasi Background -->
    <div class="absolute inset-0 opacity-40 bg-[radial-gradient(#cbd5e1_1px,transparent_1px)] [background-size:20px_20px]"></div>
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-green-400 rounded-full blur-3xl opacity-20 pointer-events-none"></div>
    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-400 rounded-full blur-3xl opacity-20 pointer-events-none"></div>

    <div class="max-w-md w-full space-y-8 relative z-10 bg-white p-8 sm:p-10 rounded-3xl shadow-2xl shadow-slate-200/60 border border-slate-100">
        <div class="text-center">
            <div class="mx-auto w-16 h-16 bg-green-600 rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-green-600/30 mb-6">
                PB
            </div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Portal Perangkat Desa</h2>
            <p class="mt-2 text-xs text-slate-500">Silakan masuk untuk mengelola arsip surat pengantar warga</p>
        </div>

        <!-- Kotak Informasi Kredensial Default -->
        <div class="bg-amber-50 rounded-2xl p-4 border border-amber-200/80 text-left">
            <div class="flex items-center gap-2 text-amber-800 font-bold text-xs uppercase tracking-wide mb-1.5">
                <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                Info Login Default Staf
            </div>
            <div class="grid grid-cols-1 gap-1 text-xs text-amber-900/80 font-mono">
                <div>Email: <span class="font-bold select-all bg-amber-100 px-1.5 py-0.5 rounded">admin@pasirbaru.go.id</span></div>
                <div>Password: <span class="font-bold select-all bg-amber-100 px-1.5 py-0.5 rounded">admin123</span></div>
            </div>
        </div>

        @if($errors->any())
            <div class="rounded-xl bg-red-50 p-4 border border-red-200 text-red-800 text-xs flex items-start gap-2.5">
                <svg class="w-4 h-4 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                <div>
                    @foreach($errors->all() as $err)
                        <p>{{ $err }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('login.attempt') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Email Staf Balai</label>
                    <div class="relative">
                        <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email', 'admin@pasirbaru.go.id') }}" class="appearance-none relative block w-full px-4 py-3 pl-11 border border-slate-200 placeholder-slate-400 text-slate-800 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition shadow-sm" placeholder="nama@pasirbaru.go.id">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Kata Sandi</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" autocomplete="current-password" required value="admin123" class="appearance-none relative block w-full px-4 py-3 pl-11 border border-slate-200 placeholder-slate-400 text-slate-800 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition shadow-sm" placeholder="••••••••">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" value="1" class="h-4 w-4 text-green-600 focus:ring-green-500 border-slate-300 rounded">
                    <label for="remember" class="ml-2 block text-xs text-slate-600 font-medium">Ingat saya di komputer ini</label>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 shadow-lg shadow-green-600/25 transition transform active:scale-95">
                    Masuk ke Panel Administrasi
                </button>
            </div>
        </form>

        <div class="text-center pt-4 border-t border-slate-100">
            <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-slate-600 transition inline-flex items-center gap-1 font-medium">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Halaman Utama Desa
            </a>
        </div>
    </div>
</div>
@endsection

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');

Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{news:slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/pelayanan', [ServiceController::class, 'index'])->name('service.index');
Route::post('/pelayanan', [ServiceController::class, 'store'])->name('service.store');

// Autentikasi Staf Desa
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Panel Admin Khusus Perangkat Desa yang Sudah Login
Route::middleware('auth')->group(function () {
    Route::get('/admin/surat', [ServiceController::class, 'adminIndex'])->name('admin.service.index');
    Route::delete('/admin/surat/{letterRequest}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');
});

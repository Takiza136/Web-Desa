<?php

use App\Http\Controllers\ArchiveController;
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

Route::get('/pengarsipan', [ArchiveController::class, 'index'])->name('archive.index');
Route::post('/pengarsipan', [ArchiveController::class, 'store'])->name('archive.store');

// Autentikasi Staf Desa
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Panel Admin Khusus Perangkat Desa yang Sudah Login
Route::middleware('auth')->group(function () {
    Route::get('/admin/surat', [ServiceController::class, 'adminIndex'])->name('admin.service.index');
    Route::delete('/admin/surat/{letterRequest}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');

    Route::get('/admin/arsip', [ArchiveController::class, 'adminIndex'])->name('admin.archive.index');
    Route::get('/admin/arsip/{id}/file', [ArchiveController::class, 'showFile'])->name('admin.archive.file');
    Route::delete('/admin/arsip/{id}', [ArchiveController::class, 'destroy'])->name('admin.archive.destroy');
});

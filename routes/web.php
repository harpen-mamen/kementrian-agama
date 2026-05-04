<?php

use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('public.home');

Route::prefix('public')->name('public.')->group(function () {
    Route::get('/profil', [PublicPageController::class, 'profil'])->name('profil');
    Route::get('/rumah-ibadah', [PublicPageController::class, 'rumahIbadah'])->name('rumah-ibadah.index');
    Route::get('/rumah-ibadah/{id}', [PublicPageController::class, 'detailRumahIbadah'])->name('rumah-ibadah.show');
    Route::get('/sekolah-keagamaan', [PublicPageController::class, 'sekolahKeagamaan'])->name('sekolah-keagamaan.index');
    Route::get('/sekolah-keagamaan/{id}', [PublicPageController::class, 'detailSekolahKeagamaan'])->name('sekolah-keagamaan.show');
    Route::get('/berita', [PublicPageController::class, 'berita'])->name('berita.index');
    Route::get('/berita/{slug}', [PublicPageController::class, 'detailBerita'])->name('berita.show');
    Route::get('/peta-digital', [PublicPageController::class, 'petaDigital'])->name('peta');
    Route::get('/statistik', [PublicPageController::class, 'statistik'])->name('statistik');
    Route::get('/layanan', [PublicPageController::class, 'layanan'])->name('layanan');
    Route::get('/kontak', [PublicPageController::class, 'kontak'])->name('kontak');
});

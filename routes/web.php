<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('public.home');

Route::get('/profil', [PublicController::class, 'profil'])->name('public.profil');

Route::get('/peta-digital', [PublicController::class, 'petaDigital'])->name('public.peta');

Route::get('/statistik', [PublicController::class, 'statistik'])->name('public.statistik');

Route::get('/rumah-ibadah', [PublicController::class, 'rumahIbadah'])->name('public.rumah-ibadah.index');
Route::get('/rumah-ibadah/{id}', [PublicController::class, 'detailRumahIbadah'])->name('public.rumah-ibadah.show');

Route::get('/sekolah-keagamaan', [PublicController::class, 'sekolahKeagamaan'])->name('public.sekolah-keagamaan.index');
Route::get('/sekolah-keagamaan/{id}', [PublicController::class, 'detailSekolahKeagamaan'])->name('public.sekolah-keagamaan.show');

Route::get('/berita', [PublicController::class, 'berita'])->name('public.berita.index');
Route::get('/berita/{slug}', [PublicController::class, 'detailBerita'])->name('public.berita.show');

Route::get('/layanan', [PublicController::class, 'layanan'])->name('public.layanan');

Route::get('/kontak', [PublicController::class, 'kontak'])->name('public.kontak');
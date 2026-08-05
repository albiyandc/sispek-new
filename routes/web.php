<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/semua-layanan', [FrontController::class, 'semuaLayanan'])->name('layanan.semua');
Route::get('/track-kategori/{id}/{kategori}', [FrontController::class, 'trackKategori'])->name('kategori.track');
Route::get('/kategori/{kategori}', [FrontController::class, 'kategori'])->name('kategori.show');
Route::get('/kecamatan/{nama_kecamatan}', [FrontController::class, 'kecamatan'])->name('kecamatan.show');
Route::get('/layanan/{id}', [FrontController::class, 'detailLayanan'])->name('layanan.detail');
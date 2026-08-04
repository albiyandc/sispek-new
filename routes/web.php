<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/kecamatan/{nama_kecamatan}', [FrontController::class, 'kecamatan'])->name('kecamatan.show');
Route::get('/layanan/{id}', [FrontController::class, 'detailLayanan'])->name('layanan.detail');
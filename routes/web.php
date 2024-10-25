<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman utama
Route::get('/', function () {
    return view('home'); // Halaman Home
})->name('home'); // Beri nama untuk memudahkan penggunaan di link

// Rute untuk pendaftaran siswa
Route::get('/pendaftaran', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/pendaftaran', [SiswaController::class, 'store'])->name('siswa.store');

// Rute untuk cek status pendaftaran
Route::get('/cek-status', [SiswaController::class, 'cekStatus'])->name('cek-status');

// Rute untuk pengumuman hasil seleksi
Route::get('/pengumuman', [SiswaController::class, 'pengumuman'])->name('pengumuman');

// Rute untuk halaman bantuan dan FAQ
Route::get('/bantuan-faq', function () {
    return view('bantuan_faq'); // Halaman Bantuan dan FAQ
})->name('bantuan-faq');
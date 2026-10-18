<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini adalah tempat mendaftarkan semua rute web untuk aplikasi Anda.
|
*/

// Halaman Utama (Landing Page Karang Taruna ARUM)
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes (Mencakup Login, Register, Logout, Lupa Password)
Auth::routes();

// Halaman Dashboard / Home setelah pengguna berhasil login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
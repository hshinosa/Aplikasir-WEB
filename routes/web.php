<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProductController;

// Route untuk halaman login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route untuk dashboard, langsung diakses setelah login
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard/pengguna', [PenggunaController::class, 'index'])->name('dashboard.pengguna');
Route::get('/dashboard/produk', [ProductController::class, 'index'])->name('dashboard.produk');
Route::get('/dashboard/pengguna/{id}', [PenggunaController::class, 'show'])->name('dashboard.userdetail');




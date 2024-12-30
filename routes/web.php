<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PelangganController;

// Route untuk halaman login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route untuk dashboard
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

// Rute Pengguna
Route::get('/dashboard/pengguna', [PenggunaController::class, 'index'])->name('dashboard.pengguna');
Route::delete('/dashboard/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('dashboard.penggunadestroy');
Route::put('/dashboard/pengguna/{id}', [PenggunaController::class, 'update'])->name('dashboard.penggunaupdate');
Route::get('/dashboard/pengguna/{id}', [PenggunaController::class, 'show'])->name('dashboard.userdetail');

// Rute Produk
Route::get('/dashboard/produk', [ProductController::class, 'index'])->name('dashboard.produk');
Route::get('/dashboard/pengguna/{id}/produk', [ProductController::class, 'showByUser'])->name('dashboard.productuser'); // Menampilkan produk pengguna
Route::put('/dashboard/pengguna/{id}/produk/{produkId}', [ProductController::class, 'update'])->name('dashboard.productupdate'); // Mengupdate produk
Route::delete('/dashboard/pengguna/{id}/produk/{produkId}', [ProductController::class, 'destroy'])->name('dashboard.productdestroy'); // Menghapus produk

// Rute Pelanggan
Route::get('/dashboard/pengguna/{id}/customeruser', [PelangganController::class, 'index'])->name('dashboard.customeruser');
Route::get('/dashboard/pengguna/{id}/customeruser/{customerId}/edit', [PelangganController::class, 'show'])->name('dashboard.customeredit');
Route::put('/dashboard/pengguna/{id}/customeruser/{customerId}', [PelangganController::class, 'update'])->name('dashboard.customerupdate');
Route::delete('/dashboard/pengguna/{id}/customeruser/{customerId}', [PelangganController::class, 'destroy'])->name('dashboard.customerdestroy');

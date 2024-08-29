<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PenulisController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::guard('user')->check()) {
        return redirect('/dashboard');
    }
    return view('auth.v_login');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::post('/prosesLogin', [AuthController::class, 'prosesLogin']);
Route::post('/prosesLogout', [AuthController::class, 'prosesLogout']);

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/{id}', [BukuController::class, 'editBuku']);
Route::get('/modal-detail-buku/{id}', [BukuController::class, 'detailBuku']);
Route::post('/tambah-buku', [BukuController::class, 'tambahBuku']);
Route::post('/buku/{id}', [BukuController::class, 'updateBuku']);
Route::post('/hapus-buku/{id}', [BukuController::class, 'hapusBuku']);
Route::get('/laporan', [BukuController::class, 'laporan']);
Route::post('/laporan', [BukuController::class, 'getLaporan']);

Route::get('/my-buku', [BukuController::class, 'bukuSaya']);

Route::get('/penerbit', [PenerbitController::class, 'index']);
Route::get('/penerbit/{id}', [PenerbitController::class, 'detailPenerbit']);
Route::get('/update-penerbit/{id}', [PenerbitController::class, 'updatePenerbit']);
Route::post('/update-penerbit/{id}', [PenerbitController::class, 'editPenerbit']);
Route::post('/penerbit', [PenerbitController::class, 'tambahPenerbit']);
Route::post('/hapus-penerbit/{id}', [PenerbitController::class, 'hapusPenerbit']);

Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/update-kategori/{id}', [KategoriController::class, 'updateKategori']);
Route::post('/kategori', [KategoriController::class, 'tambahKategori']);
Route::post('/update-kategori/{id}', [KategoriController::class, 'editKategori']);
Route::post('/hapus-kategori/{id}', [KategoriController::class, 'hapusKategori']);

Route::get('/penulis', [PenulisController::class, 'index']);
Route::get('/update-penulis/{id}', [PenulisController::class, 'updatePenulis']);
Route::get('/detail-penulis/{id}', [PenulisController::class, 'detailPenulis']);
Route::post('/penulis', [PenulisController::class, 'tambahPenulis']);
Route::post('/hapus-penulis/{id}', [PenulisController::class, 'hapusPenulis']);
Route::post('/update-penulis/{id}', [PenulisController::class, 'editPenulis']);

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::guard('user')->check()) {
        return redirect('/dashboard');
    }
    return view('auth.v_login');
});

Route::post('/prosesLogin', [AuthController::class, 'prosesLogin']);
Route::post('/prosesLogout', [AuthController::class, 'prosesLogout']);

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/{id}', [BukuController::class, 'editBuku']);
Route::get('/modal-detail-buku/{id}', [BukuController::class, 'detailBuku']);
Route::post('/tambah-buku', [BukuController::class, 'tambahBuku']);
Route::post('/buku/{id}', [BukuController::class, 'updateBuku']);
Route::post('/hapus/{id}', [BukuController::class, 'hapusBuku']);


Route::get('/dashboard', function () {
    return view('v_dashboard');
});

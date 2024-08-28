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
Route::post('/tambah-buku', [BukuController::class, 'tambahBuku']);


Route::get('/dashboard', function () {
    return view('v_dashboard');
});

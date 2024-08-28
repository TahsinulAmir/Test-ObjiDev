<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use App\Models\PenerbitModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $penulis_id = Auth::guard('user')->user()->id;
        $data = [
            'title' => 'Dashboard',
            'jml_buku' => BukuModel::count(),
            'jml_penulis' => User::where('role', 'penulis')->count(),
            'jml_penerbit' => PenerbitModel::count(),
            'jml_kategori' => KategoriModel::count(),
            'jml_bukuku' => BukuModel::where('penulis_id', $penulis_id)->count(),
        ];

        return view('v_dashboard', $data);
    }
}

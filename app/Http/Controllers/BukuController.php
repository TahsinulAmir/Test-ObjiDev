<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use App\Models\PenerbitModel;
use App\Models\User;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $all_buku = BukuModel::join('users', 'buku.penulis_id', '=', 'users.id')
            ->join('penerbit_buku', 'buku.penerbit_id', '=', 'penerbit_buku.id')
            ->join('kategori_buku', 'buku.kategori_id', '=', 'kategori_buku.id')
            ->select('buku.*', 'users.name', 'penerbit_buku.nama', 'kategori_buku.kategori')
            ->get();

        $all_penulis = User::where('role', 'penulis')
            ->select('id', 'name')
            ->get();

        $data = [
            'title' => 'Daftar Buku',
            'all_buku' => $all_buku,
            'all_penulis' => $all_penulis,
            'all_kategori' => KategoriModel::all(),
            'all_penerbit' => PenerbitModel::all()
        ];

        // dd($data['all_penulis']);
        return view('buku.v_daftar_buku', $data);
    }

    public function tambahBuku(Request $request)
    {
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $nama_file = "cover_" . time() . '.' . $file->getClientOriginalExtension();

            // Simpan gambar ke storage
            $file->storeAs('public/assets/cover', $nama_file);
        } else {
            $nama_file = null;
        }

        $data = BukuModel::create([
            'judul_buku' => $request->judul_buku,
            'penulis_id' => $request->penulis_id,
            'penerbit_id' => $request->penerbit_id,
            'kategori_id' => $request->kategori_id,
            'thn_terbit' => $request->thn_terbit,
            'deskripsi' => $request->deskripsi,
            'cover' => $nama_file,
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $data,
            'iteration' => BukuModel::count()
        ]);
    }
}

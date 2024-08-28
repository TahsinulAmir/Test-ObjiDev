<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kategori',
            'all_kategori' => KategoriModel::all()
        ];

        return view('kategori.v_kategori', $data);
    }

    public function tambahKategori(Request $request)
    {
        $data = KategoriModel::create([
            'kategori' => $request->kategori,
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $data,
            'iteration' => KategoriModel::count()
        ]);
    }

    public function updateKategori($id)
    {
        $detailKategori = KategoriModel::find($id);
        $data = [
            'detailKategori' => $detailKategori
        ];
        return view('kategori.modal_update_kategori', $data);

    }

    public function editKategori(Request $request, $id)
    {
        $detailPenerbit = KategoriModel::find($id);
        $detailPenerbit->kategori = $request->kategori;
        $detailPenerbit->save();

        return response()->json(['message' => 'Success']);
    }

    public function hapusKategori($id)
    {
        $detailPenerbit = KategoriModel::find($id);
        $detailPenerbit->delete();

        return response()->json(['message' => 'Success']);
    }
}

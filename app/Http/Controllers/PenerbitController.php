<?php

namespace App\Http\Controllers;

use App\Models\PenerbitModel;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Penerbit',
            'all_penerbit' => PenerbitModel::all()
        ];

        return view('penerbit.v_penerbit', $data);
    }

    public function tambahPenerbit(Request $request)
    {
        $data = PenerbitModel::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_phone' => $request->no_phone,
            'email' => $request->email,
            'website' => $request->website,
            'deskripsi_penerbit' => $request->deskripsi_penerbit,
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $data,
            'iteration' => PenerbitModel::count()
        ]);
    }

    public function detailPenerbit($id)
    {
        $detailPenerbit = PenerbitModel::find($id);
        $data = [
            'detailPenerbit' => $detailPenerbit
        ];

        return view('penerbit.modal_detail_penerbit', $data);
    }

    public function updatePenerbit($id)
    {
        $detailPenerbit = PenerbitModel::find($id);
        $data = [
            'detailPenerbit' => $detailPenerbit
        ];
        return view('penerbit.modal_update_penerbit', $data);
    }

    public function editPenerbit(Request $request, $id)
    {
        $detailPenerbit = PenerbitModel::find($id);
        $detailPenerbit->nama = $request->nama;
        $detailPenerbit->alamat = $request->alamat;
        $detailPenerbit->no_phone = $request->no_phone;
        $detailPenerbit->email = $request->email;
        $detailPenerbit->website = $request->website;
        $detailPenerbit->deskripsi_penerbit = $request->deskripsi_penerbit;
        $detailPenerbit->save();

        return response()->json(['message' => 'Success']);
    }

    public function hapusPenerbit($id)
    {
        $detailPenerbit = PenerbitModel::find($id);
        $detailPenerbit->delete();

        return response()->json(['message' => 'Success']);
    }
}

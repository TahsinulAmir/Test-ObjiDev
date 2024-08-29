<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Penulis',
            'all_penulis' => User::where('role', 'penulis')->get()
        ];

        return view('penulis.v_penulis', $data);
    }

    public function tambahPenulis(Request $request)
    {
        $data = User::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_phone' => $request->no_phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'role' => 'penulis',
            'password' => $request->password,
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $data,
            'iteration' => User::where('role', 'penulis')->count()
        ]);
    }

    public function detailPenulis($id)
    {
        $detailPenulis = User::find($id);
        $data = [
            'detailPenulis' => $detailPenulis
        ];
        return view('penulis.modal_detail_penulis', $data);
    }

    public function updatePenulis($id)
    {
        $detailPenulis = User::find($id);
        $data = [
            'detailPenulis' => $detailPenulis
        ];
        return view('penulis.modal_update_penulis', $data);
    }

    public function editPenulis(Request $request, $id)
    {
        $detailPenulis = User::find($id);
        $detailPenulis->name = $request->name;
        $detailPenulis->alamat = $request->alamat;
        $detailPenulis->no_phone = $request->no_phone;
        $detailPenulis->email = $request->email;
        $detailPenulis->gender = $request->gender;
        $detailPenulis->deskripsi = $request->deskripsi;
        $detailPenulis->save();

        return response()->json(['message' => 'Success']);
    }

    public function hapusPenulis($id)
    {
        $detailPenulis = User::find($id);
        $detailPenulis->delete();

        return response()->json(['message' => 'Success']);
    }
}

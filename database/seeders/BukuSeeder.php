<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul_buku' => 'Malin Kundang',
                'penulis_id' => '2',
                'penerbit_id' => '2',
                'kategori_id' => '1',
                'thn_terbit' => '2000',
                'deskripsi' => 'Ini buku malin kundang',
            ],
            [
                'judul_buku' => 'Perjuangan Pahlawan',
                'penulis_id' => '2',
                'penerbit_id' => '1',
                'kategori_id' => '3',
                'thn_terbit' => '2010',
                'deskripsi' => 'Ini buku perjuangan pahlawan',
            ],
            [
                'judul_buku' => 'Mencari Nemo',
                'penulis_id' => '2',
                'penerbit_id' => '2',
                'kategori_id' => '2',
                'thn_terbit' => '2003',
                'deskripsi' => 'Ini buku mencari nemo',
            ],
            [
                'judul_buku' => 'Jas Merah',
                'penulis_id' => '2',
                'penerbit_id' => '3',
                'kategori_id' => '2',
                'thn_terbit' => '1999',
                'deskripsi' => 'Ini buku jas merah',
            ],
        ];

        foreach ($data as $key => $value) {
            DB::table('buku')->insert([
                'judul_buku' => $value['judul_buku'],
                'penulis_id' => $value['penulis_id'],
                'penerbit_id' => $value['penerbit_id'],
                'kategori_id' => $value['kategori_id'],
                'thn_terbit' => $value['thn_terbit'],
                'deskripsi' => $value['deskripsi'],
            ]);
        }
    }
}

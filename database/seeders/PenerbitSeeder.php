<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Alex Publisher',
                'alamat' => 'Sleman',
                'no_phone' => '09882346724',
                'email' => 'alex.publisher@alexpublisher.id',
            ],
            [
                'nama' => 'CV. Bintang Raya',
                'alamat' => 'Bandung',
                'no_phone' => '92342734785',
                'email' => 'bintangraya@bintangraya.id',
            ],
            [
                'nama' => 'PT. Medeka',
                'alamat' => 'Jakarta',
                'no_phone' => '3294792834979',
                'email' => 'merdeka@merdeka.com',
            ],
        ];

        foreach ($data as $key => $value) {
            DB::table('penerbit_buku')->insert([
                'nama' => $value['nama'],
                'alamat' => $value['alamat'],
                'no_phone' => $value['no_phone'],
                'email' => $value['email'],
            ]);
        }
    }
}

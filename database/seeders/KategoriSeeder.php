<?php

namespace Database\Seeders;

use App\Models\KategoriModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori' => 'Cerita Rakyat',
            ],
            [
                'kategori' => 'Cerita Fiksi',
            ],
            [
                'kategori' => 'Sejarah',
            ],
        ];

        foreach ($data as $key => $value) {
            DB::table('kategori_buku')->insert([
                'kategori' => $value['kategori'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

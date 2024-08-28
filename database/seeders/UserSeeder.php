<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'no_phone' => '012345564',
                'gender' => 'L',
                'role' => 'admin',
                'alamat' => 'Yogyakarta',
                'password' => 'admin123',
            ],
            [
                'name' => 'Amir',
                'email' => 'amir@gmail.com',
                'no_phone' => '0123435564',
                'gender' => 'L',
                'role' => 'penulis',
                'alamat' => 'Semarang',
                'password' => 'amir123',
            ],
            [
                'name' => 'Tahsinul',
                'email' => 'tahsinul@gmail.com',
                'no_phone' => '0123435564',
                'gender' => 'L',
                'role' => 'penulis',
                'alamat' => 'Surabaya',
                'password' => 'tahsinul123',
            ]
        ];

        foreach ($data as $key => $value) {
            User::factory()->create([
                'name' => $value['name'],
                'email' => $value['email'],
                'no_phone' => $value['no_phone'],
                'gender' => $value['gender'],
                'role' => $value['role'],
                'alamat' => $value['alamat'],
                'password' => $value['password'],
            ]);
        }
    }
}

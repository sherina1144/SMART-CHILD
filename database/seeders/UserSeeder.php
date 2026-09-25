<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat akun Admin
        User::create([
            'nama' => 'Sherina Agustin',
            'email' => 'sherina@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        // Buat akun User Biasa
        User::create([
            'nama' => 'Agatha',
            'email' => 'agatha@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
        ]);
    }
}
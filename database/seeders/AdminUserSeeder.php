<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'hafidzrakhmadi925@gmail.com', // Ganti dengan email admin Anda
            'password' => Hash::make('admin123'), // Ganti dengan password yang kuat
            'is_admin' => true,
            'email_verified_at' => now(), // Opsional: langsung verifikasi email
        ]);

        // Anda bisa menambahkan lebih banyak admin jika perlu
        // User::create([
        //     'name' => 'Another Admin',
        //     'email' => 'admin2@example.com',
        //     'password' => Hash::make('password123'),
        //     'is_admin' => true,
        // ]);
    }
}
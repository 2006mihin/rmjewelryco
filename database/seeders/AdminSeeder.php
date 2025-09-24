<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // 👈 Add this
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->updateOrInsert(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'user_name' => 'superadmin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'), // hashed password
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}

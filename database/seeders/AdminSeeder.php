<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Check if an admin already exists
        if (!Admin::where('email', 'admin@example.com')->exists()) {
            Admin::create([
                'fullname' => 'Admin User',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('StrongAdminPass123'), // You can use env() to pull from .env if needed
                'role' => 'admin', // Optional if handled in logic
            ]);

            echo "Default admin created.\n";
        } else {
            echo "Admin already exists.\n";
        }
    }
}

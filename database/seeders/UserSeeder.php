<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'fullname' => 'Admin User',
                'username' => 'admin',
                'email' => 'admin@cardify.com',
                'password' => Hash::make('pass1234'),
                // You can use env() to pull from .env if needed
                'role' => 'admin',
            ]);

            echo "Default admin created.\n";
        } else {
            echo "Admin already exists.\n";
        }
    }
}

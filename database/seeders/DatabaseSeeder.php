<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Regular User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('User123'),
            'role' => 'user',
        ]);
    }
}

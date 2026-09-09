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
        User::insert([
            [
                'name' => 'Test User',
                'email' => 'test@test.com',
                'phone' => '1234567890',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'phone' => '0987654321',
                'password' => bcrypt('password'),
            ],
        ]);
    }
}

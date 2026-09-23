<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Mohamed El Araby',
            'email' => 'elaraby@arab.com',
            'phone' => '01069880640',
            'role' => 'super_admin',
            'password' => bcrypt('3302856777'),
        ]);
    }
}

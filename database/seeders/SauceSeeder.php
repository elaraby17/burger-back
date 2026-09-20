<?php

namespace Database\Seeders;

use App\Models\Sauce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SauceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sauces = [
            [
                'name_en' => 'Ketchup',
                'name_ar' => 'كاتشب',
                'icon' => 'ketchup.png',
                'active' => true,
                'order' => 1,
            ],
            [
                'name_en' => 'Mayonnaise',
                'name_ar' => 'مايونيز',
                'icon' => 'mayonnaise.png',
                'active' => true,
                'order' => 2,
            ],
            [
                'name_en' => 'Mustard',
                'name_ar' => 'خردل',
                'icon' => 'mustard.png',
                'active' => true,
                'order' => 3,
            ],
        ];

        foreach ($sauces as $sauce) {
            Sauce::create($sauce);
        }
    }
}

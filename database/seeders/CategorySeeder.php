<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [

            [
                'id' => 1,
                'slug' => 'burgers',
                'name_en' => 'Burgers',
                'name_ar' => 'سندوتشات البرجر',
                'description_en' => 'Smash-pressed patties, toasted buns, house sauce.',
                'description_ar' => 'قطعة سماش مضغوطة، خبز محمص، وصوص البيت.',
                'icon' => 'beef',
                'active' => true,
                'order' => 1,
            ],

            [
                'id' => 2,
                'slug' => 'special-burgers',
                'name_en' => 'Special Burgers',
                'name_ar' => 'البرجر الخاص',
                'description_en' => 'Bigger patties, bolder builds.',
                'description_ar' => 'قطعة أكبر، وتركيبة أقوى.',
                'icon' => 'flame',
                'active' => true,
                'order' => 2,
            ],

            [
                'id' => 3,
                'slug' => 'peek-cup-sauces',
                'name_en' => 'Peek Cup & Sauces',
                'name_ar' => 'بيك كب والصوصات',
                'description_en' => 'Snackable cups with a sauce of your choice.',
                'description_ar' => 'أكواب سريعة مع صوص من اختيارك.',
                'icon' => 'cup-soda',
                'active' => true,
                'order' => 3,
            ],

            [
                'id' => 4,
                'slug' => 'sauces',
                'name_en' => 'Sauces',
                'name_ar' => 'الصوصات',
                'description_en' => 'Extra sauces on the side.',
                'description_ar' => 'صوصات إضافية بجانب طلبك.',
                'icon' => 'droplet',
                'active' => true,
                'order' => 4,
            ],

            [
                'id' => 5,
                'slug' => 'soda-coffee',
                'name_en' => 'Soda & Coffee',
                'name_ar' => 'المشروبات الغازية والقهوة',
                'description_en' => 'Fresh sodas and iced coffee.',
                'description_ar' => 'مشروبات غازية طازجة وقهوة مثلجة.',
                'icon' => 'cup-soda',
                'active' => true,
                'order' => 5,
            ],

            [
                'id' => 6,
                'slug' => 'pan-cake',
                'name_en' => 'Pan Cake',
                'name_ar' => 'بان كيك',
                'description_en' => 'Mini pancakes by the box.',
                'description_ar' => 'بان كيك صغير بالعلبة.',
                'icon' => 'cookie',
                'active' => true,
                'order' => 6,
            ],

            [
                'id' => 7,
                'slug' => 'new-items',
                'name_en' => 'New Items',
                'name_ar' => 'أصناف جديدة',
                'description_en' => 'Fresh off the grill.',
                'description_ar' => 'أحدث إضافات المنيو.',
                'icon' => 'sparkles',
                'active' => true,
                'order' => 7,
            ],

        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['id' => $category['id']],
                $category
            );
        }
    }
}


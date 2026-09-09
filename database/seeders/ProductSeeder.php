<?php

namespace Database\Seeders;


use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $image = 'products/FPo5SrD0pNoGAn3DvLXxZdAJxuNsI0tlfa6f3o4d.webp';

        $products = [

            // =====================================================
            // BURGERS - category_id = 1
            // =====================================================

            [
                'id' => 1,
                'category_id' => 1,
                'slug' => 'classic-burger',
                'name_en' => 'Classic Burger',
                'name_ar' => 'كلاسيك برجر',
                'description_en' => 'Our signature 120g smash patty with Peek sauce, lettuce and pickles, served with fries.',
                'description_ar' => 'قطعة سماش برجر 120 جرام مع بيك صوص، خس وخيار مخلل، وبطاطس.',
                'image' => $image,
                'price' => 70,
                'active' => true,
                'popular' => true,
                'is_new' => false,
                'order' => 1,
            ],

            [
                'id' => 2,
                'category_id' => 1,
                'slug' => 'barbecue-rings',
                'name_en' => 'Barbecue Rings',
                'name_ar' => 'باربيكيو رينج',
                'description_en' => 'Smash patty loaded with crispy onion rings and smoky BBQ sauce.',
                'description_ar' => 'سماش برجر مع اونيون رينجز مقرمشة وصوص باربيكيو مدخن.',
                'image' => $image,
                'price' => 85,
                'active' => true,
                'popular' => true,
                'is_new' => false,
                'order' => 2,
            ],

            [
                'id' => 3,
                'category_id' => 1,
                'slug' => 'mexicano',
                'name_en' => 'Mexicano',
                'name_ar' => 'مكسيكانو',
                'description_en' => 'A spicy Mexican-sauce build with sausage slices.',
                'description_ar' => 'سماش برجر بصوص مكسيكانو حار مع شرائح سوسيس.',
                'image' => $image,
                'price' => 90,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 3,
            ],

            [
                'id' => 4,
                'category_id' => 1,
                'slug' => 'mushroom-ranch',
                'name_en' => 'Mushroom Ranch',
                'name_ar' => 'مشروم رانش',
                'description_en' => 'Sauteed mushrooms and creamy ranch sauce over a smash patty.',
                'description_ar' => 'مشروم مع صوص رانش كريمي فوق قطعة سماش برجر.',
                'image' => $image,
                'price' => 95,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 4,
            ],

            [
                'id' => 5,
                'category_id' => 1,
                'slug' => 'amsterdam',
                'name_en' => 'Amsterdam',
                'name_ar' => 'امستردام',
                'description_en' => 'Texas sauce and pepperoni for a bold, smoky bite.',
                'description_ar' => 'صوص تكساس مع بيبروني لطعم مدخن قوي.',
                'image' => $image,
                'price' => 100,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 5,
            ],

            [
                'id' => 6,
                'category_id' => 1,
                'slug' => 'world-war',
                'name_en' => 'World War',
                'name_ar' => 'وورلد وور',
                'description_en' => 'Texas & cheddar sauce with smoked turkey slices.',
                'description_ar' => 'صوص تكساس وشيدر مع شرائح تركي مدخن.',
                'image' => $image,
                'price' => 100,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 6,
            ],

            [
                'id' => 7,
                'category_id' => 1,
                'slug' => 'peek-peek-burger',
                'name_en' => 'Peek Peek Burger',
                'name_ar' => 'بيبيك برجر',
                'description_en' => 'Texas & cheddar sauce loaded with mozzarella sticks.',
                'description_ar' => 'صوص تكساس وشيدر مع موتزاريلا ستيكس.',
                'image' => $image,
                'price' => 105,
                'active' => true,
                'popular' => true,
                'is_new' => false,
                'order' => 7,
            ],

            [
                'id' => 8,
                'category_id' => 1,
                'slug' => 'kids-meal',
                'name_en' => 'Kids Meal',
                'name_ar' => 'كيدز ميل',
                'description_en' => 'A gentler 100g patty with fries and juice — sized for smaller appetites.',
                'description_ar' => 'قطعة سماش برجر 100 جرام مع بطاطس وعصير — مناسبة للأطفال.',
                'image' => $image,
                'price' => 70,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 8,
            ],

            // =====================================================
            // SPECIAL BURGERS - category_id = 2
            // =====================================================

            [
                'id' => 9,
                'category_id' => 2,
                'slug' => 'peek-burger-ultimate',
                'name_en' => 'Peek Burger Ultimate',
                'name_ar' => 'بييك برجر',
                'description_en' => 'A 200g patty stacked with crispy chicken, caramelized onion and beef bacon.',
                'description_ar' => 'قطعة برجر 200 جرام مع قطعة فراخ كريسبي، بصل مكرمل، وبيف بيكون.',
                'image' => $image,
                'price' => 140,
                'active' => true,
                'popular' => true,
                'is_new' => false,
                'order' => 9,
            ],

            [
                'id' => 10,
                'category_id' => 2,
                'slug' => 'juicy-lucy',
                'name_en' => 'Juicy Lucy',
                'name_ar' => 'جوسي لوسي',
                'description_en' => 'A 200g patty with lettuce, Peek sauce, cheddar sauce and crispy chicken.',
                'description_ar' => 'قطعة برجر 200 جرام مع خس، صوص البيك، صوص شيدر، وقطعة فراخ كريسبي.',
                'image' => $image,
                'price' => 155,
                'active' => true,
                'popular' => true,
                'is_new' => false,
                'order' => 10,
            ],

            // =====================================================
            // PEEK CUP & SAUCES - category_id = 3
            // =====================================================

            [
                'id' => 11,
                'category_id' => 3,
                'slug' => 'chicken-strips-cup',
                'name_en' => 'Chicken Strips',
                'name_ar' => 'قطع ستريبس',
                'description_en' => 'Crispy chicken strips served with fries and a sauce of your choice.',
                'description_ar' => 'قطع ستريبس مقرمشة مع بطاطس وصوص من اختيارك.',
                'image' => $image,
                'price' => 80,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 11,
            ],

            [
                'id' => 12,
                'category_id' => 3,
                'slug' => 'smash-patty-cup',
                'name_en' => 'Smash Patty Cup',
                'name_ar' => 'قطعة اسماش برجر',
                'description_en' => 'A smash patty cup with fries and a sauce of your choice.',
                'description_ar' => 'قطعة اسماش برجر مع بطاطس وصوص من اختيارك.',
                'image' => $image,
                'price' => 70,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 12,
            ],

            [
                'id' => 13,
                'category_id' => 3,
                'slug' => 'jalapeno-fries',
                'name_en' => 'Jalapeño Fries',
                'name_ar' => 'هالبينو فرايز',
                'description_en' => 'Fries loaded with jalapeños and a sauce of your choice.',
                'description_ar' => 'بطاطس مع هالبينو وصوص من اختيارك.',
                'image' => $image,
                'price' => 60,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 13,
            ],

            [
                'id' => 14,
                'category_id' => 3,
                'slug' => 'cup-fries',
                'name_en' => 'Cup Fries',
                'name_ar' => 'كب فرايز',
                'description_en' => 'A cup of crispy fries with a sauce of your choice.',
                'description_ar' => 'كوب بطاطس مقرمشة مع صوص من اختيارك.',
                'image' => $image,
                'price' => 45,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 14,
            ],

            // =====================================================
            // SAUCES - category_id = 4
            // =====================================================

            [
                'id' => 15,
                'category_id' => 4,
                'slug' => 'barbecue-sauce',
                'name_en' => 'Barbecue Sauce',
                'name_ar' => 'باربيكيو',
                'description_en' => 'Smoky barbecue sauce on the side.',
                'description_ar' => 'صوص باربيكيو مدخن بجانب طلبك.',
                'image' => $image,
                'price' => 15,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 15,
            ],

            [
                'id' => 16,
                'category_id' => 4,
                'slug' => 'cheddar-sauce',
                'name_en' => 'Cheddar Sauce',
                'name_ar' => 'شيدر',
                'description_en' => 'Creamy cheddar sauce on the side.',
                'description_ar' => 'صوص شيدر كريمي بجانب طلبك.',
                'image' => $image,
                'price' => 15,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 16,
            ],

            [
                'id' => 17,
                'category_id' => 4,
                'slug' => 'chilli-sauce',
                'name_en' => 'Chilli Sauce',
                'name_ar' => 'تشيلي',
                'description_en' => 'Spicy chilli sauce on the side.',
                'description_ar' => 'صوص تشيلي حار بجانب طلبك.',
                'image' => $image,
                'price' => 15,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 17,
            ],

            [
                'id' => 18,
                'category_id' => 4,
                'slug' => 'honey-yummy-sauce',
                'name_en' => 'Honey Yummy Sauce',
                'name_ar' => 'صوص هاني يامي',
                'description_en' => 'Our sweet honey-mustard house sauce.',
                'description_ar' => 'صوص هاني يامي المميز — حلو ومنعش.',
                'image' => $image,
                'price' => 15,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 18,
            ],

            // =====================================================
            // SODA & COFFEE - category_id = 5
            // =====================================================

            [
                'id' => 19,
                'category_id' => 5,
                'slug' => 'kiwi-mint',
                'name_en' => 'Kiwi Mint',
                'name_ar' => 'كيوي نعناع',
                'description_en' => 'Kiwi, mint, soda and lemon.',
                'description_ar' => 'كيوي، نعناع، صودا وليمون.',
                'image' => $image,
                'price' => 60,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 19,
            ],

            [
                'id' => 20,
                'category_id' => 5,
                'slug' => 'sunshine',
                'name_en' => 'Sunshine',
                'name_ar' => 'صن شاين',
                'description_en' => 'Strawberry, orange and soda.',
                'description_ar' => 'فراولة، برتقال وصودا.',
                'image' => $image,
                'price' => 50,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 20,
            ],

            [
                'id' => 21,
                'category_id' => 5,
                'slug' => 'mojito',
                'name_en' => 'Mojito',
                'name_ar' => 'موخيتو',
                'description_en' => 'Mojito, mint, lemon and soda.',
                'description_ar' => 'موخيتو، نعناع، ليمون وصودا.',
                'image' => $image,
                'price' => 50,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 21,
            ],

            [
                'id' => 22,
                'category_id' => 5,
                'slug' => 'mint-soda',
                'name_en' => 'Mint Soda',
                'name_ar' => 'صودا منت',
                'description_en' => 'Mint, lemon and soda.',
                'description_ar' => 'نعناع، ليمون وصودا.',
                'image' => $image,
                'price' => 50,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 22,
            ],

            [
                'id' => 23,
                'category_id' => 5,
                'slug' => 'cherry-blue-sky',
                'name_en' => 'Cherry Blue Sky',
                'name_ar' => 'شيري بلوسكاي',
                'description_en' => 'Cherry, blue curaçao and soda.',
                'description_ar' => 'كريز، بلو كوراساو وصودا.',
                'image' => $image,
                'price' => 55,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 23,
            ],

            [
                'id' => 24,
                'category_id' => 5,
                'slug' => 'iced-coffee',
                'name_en' => 'Iced Coffee',
                'name_ar' => 'ايس كوفي',
                'description_en' => 'Classic iced coffee.',
                'description_ar' => 'ايس كوفي كلاسيك.',
                'image' => $image,
                'price' => 60,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 24,
            ],

            [
                'id' => 25,
                'category_id' => 5,
                'slug' => 'frappuccino',
                'name_en' => 'Frappuccino',
                'name_ar' => 'فرابتشينو',
                'description_en' => 'Blended iced coffee frappé.',
                'description_ar' => 'فرابتشينو مثلج.',
                'image' => $image,
                'price' => 60,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 25,
            ],

            [
                'id' => 26,
                'category_id' => 5,
                'slug' => 'iced-mocha',
                'name_en' => 'Iced Mocha',
                'name_ar' => 'ايس موكا',
                'description_en' => 'Iced mocha with chocolate.',
                'description_ar' => 'ايس موكا بالشوكولاتة.',
                'image' => $image,
                'price' => 60,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 26,
            ],

            [
                'id' => 27,
                'category_id' => 5,
                'slug' => 'iced-latte',
                'name_en' => 'Iced Latte',
                'name_ar' => 'ايس لاتيه',
                'description_en' => 'Smooth iced latte.',
                'description_ar' => 'ايس لاتيه ناعم.',
                'image' => $image,
                'price' => 60,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 27,
            ],

            // =====================================================
            // PAN CAKE - category_id = 6
            // =====================================================

            [
                'id' => 28,
                'category_id' => 6,
                'slug' => 'nutella-pancake',
                'name_en' => 'Nutella Pancake',
                'name_ar' => 'بان كيك نوتيلا',
                'description_en' => 'Mini pancakes with Nutella.',
                'description_ar' => 'بان كيك صغير بالنوتيلا.',
                'image' => $image,
                'price' => 50,
                'active' => true,
                'popular' => true,
                'is_new' => false,
                'order' => 28,
            ],

            [
                'id' => 29,
                'category_id' => 6,
                'slug' => 'lotus-pancake',
                'name_en' => 'Lotus Pancake',
                'name_ar' => 'بان كيك لوتس',
                'description_en' => 'Mini pancakes with Lotus spread.',
                'description_ar' => 'بان كيك صغير باللوتس.',
                'image' => $image,
                'price' => 55,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 29,
            ],

            [
                'id' => 30,
                'category_id' => 6,
                'slug' => 'caramel-pancake',
                'name_en' => 'Caramel Pancake',
                'name_ar' => 'بان كيك كاراميل',
                'description_en' => 'Mini pancakes with caramel.',
                'description_ar' => 'بان كيك صغير بالكاراميل.',
                'image' => $image,
                'price' => 50,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 30,
            ],

            [
                'id' => 31,
                'category_id' => 6,
                'slug' => 'white-chocolate-pancake',
                'name_en' => 'White Chocolate Pancake',
                'name_ar' => 'بان كيك وايت شوكلت',
                'description_en' => 'Mini pancakes with white chocolate.',
                'description_ar' => 'بان كيك صغير بالوايت شوكلت.',
                'image' => $image,
                'price' => 50,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 31,
            ],

            [
                'id' => 32,
                'category_id' => 6,
                'slug' => 'pistachio-pancake',
                'name_en' => 'Pistachio Pancake',
                'name_ar' => 'بان كيك بستاشيو',
                'description_en' => 'Mini pancakes with pistachio.',
                'description_ar' => 'بان كيك صغير بالبستاشيو.',
                'image' => $image,
                'price' => 70,
                'active' => true,
                'popular' => false,
                'is_new' => false,
                'order' => 32,
            ],

            // =====================================================
            // NEW ITEMS - category_id = 7
            // =====================================================

            [
                'id' => 33,
                'category_id' => 7,
                'slug' => 'koko-smoke',
                'name_en' => 'KoKo Smoke',
                'name_ar' => 'KoKo SMOKE',
                'description_en' => 'Grilled chicken breast with lettuce and honey-yummy sauce.',
                'description_ar' => 'صدر فراخ مشوي مع خس وصوص هاني يامي.',
                'image' => $image,
                'price' => 120,
                'active' => true,
                'popular' => true,
                'is_new' => true,
                'order' => 33,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['id' => $product['id']],
                $product
            );
        }
    }
}


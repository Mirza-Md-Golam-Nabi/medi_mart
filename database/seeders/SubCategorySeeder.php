<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sub_categories = [
            [
                'type_id' => 1,
                'category_id' => 1,
                'title' => 'Spices',
            ],
            [
                'type_id' => 1,
                'category_id' => 1,
                'title' => 'Salt & Sugar',
            ],
            [
                'type_id' => 1,
                'category_id' => 1,
                'title' => 'Rice',
            ],
            [
                'type_id' => 1,
                'category_id' => 1,
                'title' => 'Dal or Lentil',
            ],
            [
                'type_id' => 1,
                'category_id' => 1,
                'title' => 'Oil',
            ],
            [
                'type_id' => 1,
                'category_id' => 1,
                'title' => 'Shemai & Suji',
            ],
            [
                'type_id' => 1,
                'category_id' => 2,
                'title' => "Women's Soaps",
            ],
            [
                'type_id' => 1,
                'category_id' => 2,
                'title' => 'Hair Care',
            ],
            [
                'type_id' => 1,
                'category_id' => 2,
                'title' => "Women's Shampoos & Conditioners",
            ],
            [
                'type_id' => 1,
                'category_id' => 3,
                'title' => "Men's Perfume",
            ],
            [
                'type_id' => 1,
                'category_id' => 4,
                'title' => "Liquid Handwash",
            ],
        ];

        foreach ($sub_categories as $sub_category) {
            SubCategory::firstOrCreate($sub_category);
        }
    }
}

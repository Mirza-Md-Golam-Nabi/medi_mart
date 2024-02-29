<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'type_id' => 1,
                'title' => 'Cooking',
            ],
            [
                'type_id' => 1,
                'title' => "Women's Care",
            ],
            [
                'type_id' => 1,
                'title' => "Men's Care",
            ],
            [
                'type_id' => 1,
                'title' => 'Handwash',
            ],
            [
                'type_id' => 1,
                'title' => 'Dairy & Eggs',
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'type_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 1,
                'name' => 'Product 1',
                'image' => null,
                'weight' => 500,
                'unit' => 'gm',
            ],
            [
                'type_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 2,
                'name' => 'Product 2',
                'image' => null,
                'weight' => 500,
                'unit' => 'gm',
            ],
            [
                'type_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 3,
                'name' => 'Product 3',
                'image' => null,
                'weight' => 500,
                'unit' => 'ml',
            ],
            [
                'type_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 4,
                'name' => 'Product 4',
                'image' => null,
                'weight' => 1,
                'unit' => 'kg',
            ],
            [
                'type_id' => 1,
                'category_id' => 2,
                'sub_category_id' => 2,
                'name' => 'Product 5',
                'image' => null,
                'weight' => 2,
                'unit' => 'kg',
            ],
            [
                'type_id' => 1,
                'category_id' => 2,
                'sub_category_id' => 2,
                'name' => 'Product 6',
                'image' => null,
                'weight' => 1,
                'unit' => 'lt',
            ],
            [
                'type_id' => 1,
                'category_id' => 2,
                'sub_category_id' => 2,
                'name' => 'Product 7',
                'image' => null,
                'weight' => 2,
                'unit' => 'lt',
            ],
            [
                'type_id' => 1,
                'category_id' => 3,
                'sub_category_id' => 3,
                'name' => 'Product 8',
                'image' => null,
                'weight' => 5,
                'unit' => 'lt',
            ],
            [
                'type_id' => 1,
                'category_id' => 3,
                'sub_category_id' => 2,
                'name' => 'Product 9',
                'image' => null,
                'weight' => 250,
                'unit' => 'gm',
            ],
            [
                'type_id' => 1,
                'category_id' => 4,
                'sub_category_id' => 2,
                'name' => 'Product 10',
                'image' => null,
                'weight' => 500,
                'unit' => 'gm',
            ],
            [
                'type_id' => 1,
                'category_id' => 4,
                'sub_category_id' => 4,
                'name' => 'Product 11',
                'image' => null,
                'weight' => 400,
                'unit' => 'gm',
            ],
            [
                'type_id' => 1,
                'category_id' => 5,
                'sub_category_id' => 1,
                'name' => 'Product 12',
                'image' => null,
                'weight' => 100,
                'unit' => 'gm',
            ],
            [
                'type_id' => 1,
                'category_id' => 5,
                'sub_category_id' => 1,
                'name' => 'Product 13',
                'image' => null,
                'weight' => 600,
                'unit' => 'ml',
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate($product);
        }

    }
}

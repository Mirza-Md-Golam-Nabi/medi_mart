<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Grocery', 'Medicine'];

        foreach ($types as $type) {
            Type::firstOrCreate(['title' => $type]);
        }
    }
}

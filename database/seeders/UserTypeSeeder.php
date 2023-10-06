<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Super Admin', 'Admin', 'Customer', 'Customer Support', 'Delivery Man',
        ];

        foreach ($types as $type) {
            UserType::firstOrCreate(['title' => $type]);
        }
    }
}

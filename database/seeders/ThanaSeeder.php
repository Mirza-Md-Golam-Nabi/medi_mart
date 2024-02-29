<?php

namespace Database\Seeders;

use App\Models\Thana;
use Illuminate\Database\Seeder;

class ThanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $thanas = [
            [
                'district_id' => 57,
                'name' => 'Jessore Sadar',
            ],
            [
                'district_id' => 57,
                'name' => 'Manirampur',
            ],
            [
                'district_id' => 57,
                'name' => 'Jhikorgacha',
            ],
            [
                'district_id' => 59,
                'name' => 'Khulna Sadar',
            ],
            [
                'district_id' => 59,
                'name' => 'Fultola',
            ],
        ];

        foreach ($thanas as $thana) {
            Thana::firstOrCreate($thana);
        }
    }
}

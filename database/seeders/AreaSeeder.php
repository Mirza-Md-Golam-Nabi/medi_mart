<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            [
                'thana_id' => 1,
                'name' => 'Barandipara',
            ],
            [
                'thana_id' => 1,
                'name' => 'Rupdia',
            ],
            [
                'thana_id' => 1,
                'name' => 'Rajarhat',
            ],
            [
                'thana_id' => 2,
                'name' => 'Basundia',
            ],
            [
                'thana_id' => 2,
                'name' => 'Jamtola',
            ],
            [
                'thana_id' => 3,
                'name' => 'Padmabila',
            ],
            [
                'thana_id' => 3,
                'name' => 'Ghuni',
            ],
            [
                'thana_id' => 4,
                'name' => 'Narandrapur',
            ],
            [
                'thana_id' => 5,
                'name' => 'Ghoragacha',
            ],
        ];

        foreach ($areas as $area) {
            Area::firstOrCreate($area);
        }
    }
}

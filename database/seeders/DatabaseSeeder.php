<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\AreaSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\DivisionSeeder;
use Database\Seeders\SubCategorySeeder;
use Database\Seeders\ThanaSeeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UserTypeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTypeSeeder::class,
            UserSeeder::class,
            DivisionSeeder::class,
            DistrictSeeder::class,
            ThanaSeeder::class,
            AreaSeeder::class,
            TypeSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
        ]);
    }
}

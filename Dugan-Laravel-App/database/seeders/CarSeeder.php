<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    public function run()
    {
        // Truncate table (be cautious in production)
        // Temporarily disable foreign key checks to allow truncation when other tables reference `cars`.
        $driver = DB::getDriverName();
        if ($driver === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('cars')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        } elseif ($driver === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF;');
            DB::table('cars')->truncate();
            DB::statement('PRAGMA foreign_keys = ON;');
        } else {
            // Fallback for other drivers
            DB::statement('PRAGMA foreign_keys = OFF;');
            DB::table('cars')->truncate();
            DB::statement('PRAGMA foreign_keys = ON;');
        }

        $cars = [
            [
                'brand' => 'Toyota',
                'model' => 'Corolla',
                'year' => 2021,
                'transmission' => 'Automatic',
                'fuel_type' => 'Gasoline',
                'price' => 19999.00,
                'quantity' => 5,
                'description' => 'Reliable compact sedan.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/9/9d/2019_Toyota_Corolla_Icon_Tech_VVT-i_HEV_1.8_Front.jpg',
            ],
            [
                'brand' => 'Honda',
                'model' => 'Civic',
                'year' => 2020,
                'transmission' => 'Manual',
                'fuel_type' => 'Gasoline',
                'price' => 21999.00,
                'quantity' => 3,
                'description' => 'Sporty and efficient.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/7d/2018_Honda_Civic_SR_VTEC_1.0_Front.jpg',
            ],
            [
                'brand' => 'Tesla',
                'model' => 'Model 3',
                'year' => 2022,
                'transmission' => 'Automatic',
                'fuel_type' => 'Electric',
                'price' => 39999.00,
                'quantity' => 2,
                'description' => 'Electric sedan with autopilot.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/63/Tesla_Model_3_parked%2C_front_driver_side.jpg',
            ],
        ];

        foreach ($cars as $car) {
            DB::table('cars')->insert($car);
        }
    }
}

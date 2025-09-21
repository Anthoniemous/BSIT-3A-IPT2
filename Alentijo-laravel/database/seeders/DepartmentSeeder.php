<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $records = [];

        for ($i = 0; $i < 500; $i++) {
            $records[] = [
                'department_id' => $i + 1, // or remove if AUTO_INCREMENT
                'name'          => $faker->company,         // e.g. "Acme Corp"
                'description'   => $faker->sentence(10),    // random description
                'year'          => $faker->numberBetween(2015, 2025),
                'section'       => $faker->randomElement(['A', 'B', 'C', 'D']),
                'admin_id'      => $faker->numberBetween(1, 20), // adjust range as needed
            ];
        }

        DB::table('department')->insert($records);
    }
}

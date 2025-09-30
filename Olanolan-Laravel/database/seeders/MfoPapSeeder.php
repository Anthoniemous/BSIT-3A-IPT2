<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MfoPapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 500; $i++) {
            DB::table('mfo_pap')->insert([
                'mfo_pap_name' => ucfirst($faker->words(3, true)), // e.g. "School Development Project"
                'created_at'   => $faker->dateTimeBetween('-1 years', 'now'),
            ]);
        }
    }
}

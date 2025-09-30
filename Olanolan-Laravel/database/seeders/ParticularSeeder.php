<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ParticularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $particulars = [
            'Tuition Fee',
            'Registration Fee',
            'Library Fee',
            'Laboratory Fee',
            'Miscellaneous Fee',
            'Athletic / Sports Fee',
            'Medical / Dental Fee',
            'ID Fee',
            'Development Fee',
            'Examination Fee',
            'PTA Fee',
            'Graduation Fee',
        ];

        for ($i = 1; $i <= 500; $i++) {
            DB::table('particular')->insert([
                'particular_name' => $faker->randomElement($particulars),
                'amount'          => $faker->randomFloat(2, 100, 20000), // between 100 and 20,000
                'created_at'      => $faker->dateTimeBetween('-1 years', 'now'),
            ]);
        }
    }
}

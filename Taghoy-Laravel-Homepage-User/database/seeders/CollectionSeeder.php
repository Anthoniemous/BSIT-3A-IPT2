<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $year = 2024;

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
            $studentId = $year . '-' . str_pad($i, 4, '0', STR_PAD_LEFT);

            DB::table('collection')->insert([
                'student_id'   => $studentId,
                'first_name'   => $faker->firstName,
                'last_name'    => $faker->lastName,
                'middle_name'  => $faker->firstName,
                'suffix'       => $faker->randomElement(['Jr.', 'Sr.', 'III', '']),
                'or_number'    => $faker->unique()->numerify('OR#####'),
                'particular'   => $faker->randomElement($particulars),
                'mfo/pap'      => $faker->word, // ⚠️ better rename this column to mfo_pap
                'amount'       => $faker->randomFloat(2, 100, 5000),
                'paid_at'      => $faker->dateTimeBetween('-1 years', 'now'),
                'sms_status'   => $faker->randomElement(['eSMS', 'iSMS']),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 500; $i++) {
            DB::table('student')->insert([
                'student_main_id' => $i, // or use $faker->unique()->numberBetween(1, 999999)
                'student_id'      => $faker->unique()->numberBetween(1000, 9999),
                'firstname'       => $faker->firstName,
                'lastname'        => $faker->lastName,
                'middlename'      => $faker->firstName,
                'birthdate'       => $faker->date('Ymd', '2010-12-31'), // int like 20010524
                'age'             => $faker->numberBetween(16, 30),
                'address'         => $faker->address,
                'gender'          => $faker->randomElement(['Male','Female']),
                'contactNumber'   => $faker->numerify('9#########'), // PH mobile style
                'email'           => $faker->unique()->safeEmail,
                'department_id'   => $faker->numberBetween(1, 20),   // adjust to your department count
                'course_id'       => $faker->numberBetween(1, 100),  // adjust to your course count
            ]);
        }
    }
}

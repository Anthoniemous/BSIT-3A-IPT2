<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 500; $i++) {
            DB::table('admin')->insert([
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName,
                'middle_name'   => $faker->firstName,
                'email_address' => $faker->unique()->safeEmail,
                'username'      => $faker->unique()->userName,
                'password'      => 'password', // 🔑 default password
                'created_at'    => $faker->dateTimeBetween('-1 years', 'now'),
            ]);
        }
    }
}

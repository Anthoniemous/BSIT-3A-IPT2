<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DownpaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $data = [];

        for ($i = 0; $i < 500; $i++) {
            $data[] = [
                // remove 'downpayment_id' if this column is AUTO_INCREMENT
                'downpayment_id'  => $i + 24, 
                'school_year'     => $faker->numberBetween(2020, 2025),
                // store as an integer yyyymmdd (as your schema uses int)
                'date_downpayment'=> (int)$faker->date('Ymd'),
                'primisorry_date' => $faker->date('Y-m-d'),
                'admin_id'        => $faker->numberBetween(1, 20), // adjust range to match your admin table
                'student_main_id' => $faker->numberBetween(1, 200), // adjust as needed
                'status'          => $faker->randomElement(['PENDING','PAID','CANCELLED']),
            ];
        }

        DB::table('downpayment')->insert($data);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Renter;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RentersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Renter::create([
                'name' => $faker->name,              // Tên người thuê
                'phone_number' => $faker->phoneNumber, // Số điện thoại
                'email' => $faker->unique()->safeEmail, // Email
            ]);
        }
    }
}

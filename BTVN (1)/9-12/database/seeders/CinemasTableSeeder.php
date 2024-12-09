<?php

namespace Database\Seeders;

use App\Models\Cinema;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CinemasTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            Cinema::create([
                'name' => $faker->company . ' Cinema',  // Tên rạp chiếu
                'location' => $faker->address,         // Địa chỉ
                'total_seats' => $faker->numberBetween(100, 500), // Tổng số ghế
            ]);
        }
    }
}

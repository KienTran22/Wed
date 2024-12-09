<?php

namespace Database\Seeders;

use App\Models\ItCenter;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ItCentersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            ItCenter::create([
                'name' => $faker->company . ' IT Center',  // Tên trung tâm tin học
                'location' => $faker->address,            // Địa chỉ trung tâm
                'contact_email' => $faker->unique()->safeEmail, // Email liên hệ
            ]);
        }
    }
}

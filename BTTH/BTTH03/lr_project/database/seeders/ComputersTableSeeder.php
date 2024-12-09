<?php

namespace Database\Seeders;

use App\Models\Computer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Computer::create([
                'computer_name' => $faker->word . '-' . $faker->randomNumber(3),
                'model' => $faker->word . ' ' . $faker->randomNumber(4),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Linux', 'macOS']),
                'processor' => $faker->randomElement(['Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5']),
                'memory' => $faker->randomElement([4, 8, 16, 32]),
                'available' => $faker->boolean,
            ]);
        }
    }
}

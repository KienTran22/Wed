<?php

namespace Database\Seeders;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class IssuesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $computers = Computer::all();

        foreach (range(1, 20) as $index) {
            Issue::create([
                'computer_id' => $computers->random()->id, // Lấy ngẫu nhiên máy tính
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeThisYear,
                'description' => $faker->paragraph,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
            ]);
        }
    }
}

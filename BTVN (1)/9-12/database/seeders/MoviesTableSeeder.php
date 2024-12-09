<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Cinema;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Movie::create([
                'title' => $faker->sentence(3),       // Tên phim
                'director' => $faker->name,           // Đạo diễn
                'release_date' => $faker->date,       // Ngày phát hành
                'duration' => $faker->numberBetween(90, 180), // Thời lượng phim
                'cinema_id' => Cinema::inRandomOrder()->first()->id, // Gán phim cho một rạp chiếu ngẫu nhiên
            ]);
        }
    }
}

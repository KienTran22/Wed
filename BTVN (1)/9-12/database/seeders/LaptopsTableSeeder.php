<?php

namespace Database\Seeders;

use App\Models\Laptop;
use App\Models\Renter;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LaptopsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Laptop::create([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Lenovo', 'Asus', 'Acer']), // Hãng máy tính
                'model' => $faker->word . ' ' . $faker->randomNumber(3), // Mẫu máy tính
                'specifications' => $faker->randomElement(['i5, 8GB RAM, 256GB SSD', 'i7, 16GB RAM, 512GB SSD', 'i3, 4GB RAM, 128GB SSD']), // Thông số kỹ thuật
                'rental_status' => $faker->boolean,  // Trạng thái cho thuê
                'renter_id' => Renter::inRandomOrder()->first()->id, // Gán một người thuê ngẫu nhiên
            ]);
        }
    }
}

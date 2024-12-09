<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicine;  // Nếu bạn đã tạo model cho bảng medicines
use Faker\Factory as Faker;

class MedicinesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Tạo 50 bản ghi thuốc mẫu
        foreach (range(1, 50) as $index) {
            Medicine::create([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->randomElement(['10mg', '50mg', '100mg', '200mg']),
                'form' => $faker->randomElement(['tablet', 'capsule', 'syrup']),
                'price' => $faker->randomFloat(2, 10, 500),  // Giá từ 10 đến 500 với 2 chữ số thập phân
                'stock' => $faker->numberBetween(1, 100),  // Số lượng tồn kho
            ]);
        }
    }
}

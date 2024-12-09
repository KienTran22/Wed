<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Medicine;
use Faker\Factory as Faker;

class SalesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Lấy tất cả các bản ghi thuốc
        $medicines = Medicine::all();

        // Tạo 100 bản ghi bán hàng mẫu
        foreach (range(1, 100) as $index) {
            $medicine = $medicines->random();  // Lấy ngẫu nhiên một loại thuốc

            Sale::create([
                'medicine_id' => $medicine->medicine_id,  // Khóa ngoại tham chiếu đến bảng medicines
                'quantity' => $faker->numberBetween(1, 10),  // Số lượng bán
                'sale_date' => $faker->dateTimeThisYear(),  // Ngày giờ bán
                'customer_phone' => $faker->optional()->phoneNumber,  // Số điện thoại người mua (tùy chọn)
            ]);
        }
    }
}

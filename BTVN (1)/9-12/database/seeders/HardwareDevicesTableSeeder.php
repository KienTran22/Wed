<?php

namespace Database\Seeders;

use App\Models\HardwareDevice;
use App\Models\ItCenter;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HardwareDevicesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 30) as $index) {
            HardwareDevice::create([
                'device_name' => $faker->word . ' ' . $faker->randomNumber(3),  // Tên thiết bị
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),  // Loại thiết bị
                'status' => $faker->boolean,  // Trạng thái thiết bị (Hoạt động hoặc hỏng)
                'center_id' => ItCenter::inRandomOrder()->first()->id, // Gán thiết bị cho trung tâm tin học ngẫu nhiên
            ]);
        }
    }
}

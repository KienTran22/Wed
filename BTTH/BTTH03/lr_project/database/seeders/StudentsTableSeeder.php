<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Classroom; // Tham chiếu bảng Classroom
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Lấy tất cả các lớp từ bảng classrooms
        $classrooms = Classroom::all();

        // Sinh dữ liệu cho 10 học sinh
        foreach (range(1, 10) as $index) {
            Student::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date(),
                'parent_phone' => $faker->phoneNumber,
                'class_id' => $classrooms->random()->id, // Chọn lớp ngẫu nhiên
            ]);
        }
    }
}

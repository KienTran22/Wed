<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Library;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Book::create([
                'title' => $faker->sentence(3),                // Tên sách
                'author' => $faker->name,                       // Tác giả
                'publication_year' => $faker->year,             // Năm xuất bản
                'genre' => $faker->word,                        // Thể loại
                'library_id' => Library::inRandomOrder()->first()->id, // Gắn sách với một thư viện ngẫu nhiên
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Gọi các Seeder để chạy
        $this->call([
            LibrariesTableSeeder::class,
            BooksTableSeeder::class,
        ]);

        $this->call([
            RentersTableSeeder::class,
            LaptopsTableSeeder::class,
        ]);

        $this->call([
            ItCentersTableSeeder::class,
            HardwareDevicesTableSeeder::class,
        ]);

        $this->call([
            CinemasTableSeeder::class,
            MoviesTableSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            MedicinesSeeder::class,
            SalesSeeder::class,
        ]);

        $this->call([
            ClassesTableSeeder::class,
            StudentsTableSeeder::class,
        ]);

        $this->call([
            ComputersTableSeeder::class,
            IssuesTableSeeder::class,
        ]);
    }
}

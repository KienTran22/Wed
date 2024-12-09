<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            // Tạo cột 'medicine_id' là khóa chính
            $table->bigIncrements('medicine_id');  // bigIncrements tạo khóa chính là 'medicine_id'
            $table->string('name');
            $table->string('brand', 199)->nullable();
            $table->string('dosage', 58);
            $table->string('form', 50);
            $table->decimal('price', 18, 2);
            $table->integer('stock');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id(); // Tạo cột ID (Primary Key)
            $table->enum('grade_level', ['Pre-K', 'Kindergarten']); // Cấp độ lớp
            $table->string('room_number', 19); // Phòng học (VD: VH7, VH8)
            $table->timestamps(); // Các cột created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
}

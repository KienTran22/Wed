<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Tạo cột ID (Primary Key)
            $table->string('first_name', 59); // Tên học sinh
            $table->string('last_name', 58); // Họ và đệm
            $table->date('date_of_birth'); // Ngày sinh
            $table->string('parent_phone', 29); // Số điện thoại phụ huynh
            $table->unsignedBigInteger('class_id'); // Khóa ngoại tham chiếu bảng classes
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade'); // Ràng buộc khóa ngoại
            $table->timestamps(); // Các cột created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}

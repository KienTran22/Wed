<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();  // Tạo cột id (Primary Key)
            $table->string('computer_name', 59); // Tên máy tính
            $table->string('model', 199); // Tên phiên bản máy tính
            $table->string('operating_system', 58); // Hệ điều hành
            $table->string('processor', 58); // Bộ vi xử lý
            $table->integer('memory'); // Bộ nhớ RAM (GB)
            $table->boolean('available')->default(true); // Trạng thái hoạt động (True: Hoạt động, False: Không hoạt động)
            $table->timestamps(); // Cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('computers');
    }
}

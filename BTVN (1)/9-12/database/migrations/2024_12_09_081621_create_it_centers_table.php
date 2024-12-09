<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('it_centers', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động (primary key)
            $table->string('name'); // Tên trung tâm
            $table->string('location'); // Địa điểm trung tâm
            $table->string('contact_email'); // Email liên hệ
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('it_centers');
    }
};

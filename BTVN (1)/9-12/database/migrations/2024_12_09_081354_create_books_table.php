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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động (primary key)
            $table->string('title'); // Tên sách
            $table->string('author'); // Tác giả
            $table->year('publication_year'); // Năm xuất bản
            $table->string('genre'); // Thể loại sách
            $table->foreignId('library_id')->constrained('libraries')->onDelete('cascade'); // Khóa ngoại tham chiếu đến bảng libraries
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

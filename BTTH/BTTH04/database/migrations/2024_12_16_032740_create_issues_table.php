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
    Schema::create('issues', function (Blueprint $table) {
        $table->id(); // Primary Key
        $table->foreignId('computer_id')->constrained('computers')->onDelete('cascade'); // Khóa ngoại
        $table->string('reported_by', 50)->nullable(); // Người báo cáo
        $table->dateTime('reported_date'); // Thời gian báo cáo
        $table->text('description'); // Mô tả chi tiết
        $table->enum('urgency', ['Low', 'Medium', 'High']); // Mức độ
        $table->enum('status', ['Open', 'In Progress', 'Resolved']); // Trạng thái
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};

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
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động (primary key)
            $table->string('device_name'); // Tên thiết bị
            $table->string('type'); // Loại thiết bị (Mouse, Keyboard, Headset, etc.)
            $table->boolean('status')->default(true); // Trạng thái hoạt động (true = đang hoạt động, false = hỏng)
            $table->foreignId('center_id')->constrained('it_centers')->onDelete('cascade'); // Khóa ngoại tham chiếu đến bảng it_centers
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_devices');
    }
};

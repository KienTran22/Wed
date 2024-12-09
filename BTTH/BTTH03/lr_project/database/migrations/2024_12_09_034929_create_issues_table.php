<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // Tạo cột id (Primary Key)
            $table->unsignedBigInteger('computer_id'); // Khóa ngoại tham chiếu tới bảng computers
            $table->string('reported_by', 58)->nullable(); // Người báo cáo sự cố (tùy chọn)
            $table->dateTime('reported_date'); // Thời gian báo cáo
            $table->text('description'); // Mô tả chi tiết sự cố
            $table->enum('urgency', ['Low', 'Medium', 'High']); // Mức độ sự cố
            $table->enum('status', ['Open', 'In Progress', 'Resolved'])->default('Open'); // Trạng thái sự cố
            $table->timestamps(); // Cột created_at và updated_at

            // Khóa ngoại liên kết với bảng computers
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('issues');
    }
}

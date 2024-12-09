<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();  // sale_id
            $table->unsignedBigInteger('medicine_id');  // khóa ngoại tham chiếu 'medicine_id' trong bảng 'medicines'
            $table->integer('quantity');
            $table->dateTime('sale_date');
            $table->string('customer_phone', 18)->nullable();
            $table->timestamps();

            // Định nghĩa khóa ngoại
            $table->foreign('medicine_id')->references('medicine_id')->on('medicines')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}

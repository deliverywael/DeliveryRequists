<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('Order_id'); // معرف الطلب
            $table->foreignId('User_id')->constrained('users')->onDelete('cascade'); // ربط بالمستخدم
            $table->foreignId('Product_id')->constrained('products')->onDelete('cascade'); // ربط بالمنتج
            $table->string('Status'); // حالة الطلب
            $table->integer('TotalCost'); // التكلفة الإجمالية
            $table->string('Payment'); // طريقة الدفع
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

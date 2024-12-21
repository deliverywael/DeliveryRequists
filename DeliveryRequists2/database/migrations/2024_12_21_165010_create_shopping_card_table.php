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
        Schema::create('shopping_card', function (Blueprint $table) {
            $table->foreignId('User_id')->constrained('users')->onDelete('cascade'); // ربط بالمستخدم
            $table->foreignId('Product_id')->constrained('products')->onDelete('cascade'); // ربط بالمنتج
            $table->integer('Products_Number'); // عدد المنتجات
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
        Schema::dropIfExists('shopping_card');
    }
};

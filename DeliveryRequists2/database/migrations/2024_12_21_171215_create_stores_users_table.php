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
        Schema::create('stores_users', function (Blueprint $table) {
            $table->foreignId('User_id')->constrained('users')->onDelete('cascade'); // ربط بالمستخدم
            $table->foreignId('Store_id')->constrained('stores')->onDelete('cascade'); // ربط بالمتجر
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
        Schema::dropIfExists('stores_users');
    }
};

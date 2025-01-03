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

    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('product_name');
        $table->integer('product_quantity');
        $table->binary('product_photo')->nullable();
        $table->bigInteger('product_price');
        $table->foreignId('Store_id')->constrained('stores')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};

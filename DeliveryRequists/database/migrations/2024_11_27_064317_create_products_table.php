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
    public function up()//hgdddddddddddddddddddddddddd
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Product_Name');
            $table->integer('Product_Quantity');
            $table->binary('Product_Photo')->nullable();
            $table->bigInteger('Product_Price');
           $table->foreignId('Store_id')->constrained()->onDelete('cascade');

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

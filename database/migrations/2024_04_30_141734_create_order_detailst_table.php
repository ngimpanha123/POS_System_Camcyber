<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_detailst', function (Blueprint $table) {
            
            $table->increments('id',true);

            $table->integer('order_id')->index()->unsigned();
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade'); // Foriegn Key from order

            $table->integer('product_id')->index()->unsigned();
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');// Foriegn Key from product

            $table->double('unit_price')->nullable();
            $table->integer('qty')->unsigned()->default(0);

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detailst');
    }
};

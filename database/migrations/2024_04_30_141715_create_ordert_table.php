<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordert', function (Blueprint $table) {
            
            $table->increments('id', true); //Rimary Key

            $table->integer('receipt_number')->unsigned()->nullable();

            $table->integer('cashier_id')->index()->unsigned();
            $table->foreign('cashier_id')->references('id')->on('user')->onDelete('cascade');

            $table->double('total_price')->nullable();
            $table->dateTime('ordered_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordert');
    }
};

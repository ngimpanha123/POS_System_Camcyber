<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            
            $table->increments('id', true); //Prmiary

            $table->integer('type_id')->index()->unsigned(); //Forgien from product
            $table->foreign('type_id')->references('id')->on('products_type')->onDelete('cascade');
            
            $table->string('code',50)->nullable();
            $table->string('name', 150)->default('');
            $table->string('image', 500)->nullable();
            $table->double('unit_price')->nullable();
            $table->decimal('discount', 10, 2)->default(0);
            
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};

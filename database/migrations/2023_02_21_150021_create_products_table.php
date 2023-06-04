<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        |--------------------------------------------------------------------------
        | Adding foreign key
        |--------------------------------------------------------------------------
        |
        | I am adding a foreign key to type_id field.
        | Here, products_type table id field has biginteger datatype
        |
        |--------------------------------------------------------------------------
        | Values
        |--------------------------------------------------------------------------
        |
        | foreign() – Pass field name which you want to foreign key constraint.
        | references() – Pass linking table field name.
        | on() – Linking table name.
        | onDelete(‘cascade’) – Enable deletion of attached data.
        */
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id')->unsigned()->default(1);
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

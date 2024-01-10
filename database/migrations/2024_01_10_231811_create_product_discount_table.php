<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_discount', function (Blueprint $table) {
            $table->integer('product_discount_id');
            $table->integer('product_discount_code')->nullable();
            $table->string('product_discount_name', 100)->nullable();
            $table->string('product_discount_info', 100)->nullable();
            $table->integer('product_discount_percent')->nullable();
            $table->string('product_discount_active', 100)->nullable();
            $table->dateTime('product_discount_insertdate')->nullable();
            $table->string('product_discount_insertby', 100)->nullable();
            $table->dateTime('product_discount_updatedate')->nullable();
            $table->integer('product_discount_updateby')->nullable();
            $table->dateTime('product_discount_deletedate')->nullable();
            $table->integer('product_discount_deleteby')->nullable();
            $table->integer('product_discount_deletestatus')->nullable();
            $table->string('product_discount_01', 100)->nullable();
            $table->string('product_discount_02', 100)->nullable();
            $table->string('product_discount_03', 100)->nullable();
            $table->string('product_discount_04', 100)->nullable();
            $table->string('product_discount_05', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_discount');
    }
}

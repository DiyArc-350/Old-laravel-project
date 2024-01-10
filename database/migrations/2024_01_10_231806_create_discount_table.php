<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount', function (Blueprint $table) {
            $table->integer('discount_id');
            $table->string('discount_code', 100)->nullable();
            $table->string('discount_serial_number', 100)->nullable();
            $table->date('discount_startdate')->nullable();
            $table->date('discount_enddate')->nullable();
            $table->string('discount_name', 100)->nullable();
            $table->string('discount_info', 100)->nullable();
            $table->integer('discount_percent')->nullable();
            $table->string('discount_active', 100)->nullable();
            $table->dateTime('discount_insertdate')->nullable();
            $table->string('discount_insertby', 100)->nullable();
            $table->dateTime('discount_updatedate')->nullable();
            $table->integer('discount_updateby')->nullable();
            $table->dateTime('discount_deletedate')->nullable();
            $table->integer('discount_deleteby')->nullable();
            $table->integer('discount_deletestatus')->nullable();
            $table->string('discount_01', 100)->nullable();
            $table->string('discount_02', 100)->nullable();
            $table->string('discount_03', 100)->nullable();
            $table->string('discount_04', 100)->nullable();
            $table->string('discount_05', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount');
    }
}

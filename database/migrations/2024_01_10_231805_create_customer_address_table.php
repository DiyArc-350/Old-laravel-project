<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_address', function (Blueprint $table) {
            $table->morphs('customer_address');
            $table->string('customer_address_code', 100)->nullable();
            $table->string('customer_number', 100)->nullable();
            $table->string('customer_address_name', 100)->nullable();
            $table->string('customer_address_phone', 100)->nullable();
            $table->string('customer_address_address', 100)->nullable();
            $table->string('customer_address_city', 100)->nullable();
            $table->string('customer_address_province', 100)->nullable();
            $table->string('customer_address_postcode', 100)->nullable();
            $table->string('customer_address_x', 100)->nullable();
            $table->string('customer_address_y', 100)->nullable();
            $table->string('customer_address_note', 100)->nullable();
            $table->string('customer_address_primary', 100)->nullable();
            $table->dateTime('customer_address_insertdate')->nullable();
            $table->integer('customer_address_insertby')->nullable();
            $table->dateTime('customer_address_updatedate')->nullable();
            $table->integer('customer_address_updateby')->nullable();
            $table->dateTime('customer_address_deletedate')->nullable();
            $table->integer('customer_address_deleteby')->nullable();
            $table->integer('customer_address_deletestatus')->nullable()->comment("1=DELETED; 0=NORMAL");
            $table->string('customer_address_01', 100)->nullable();
            $table->string('customer_address_02', 100)->nullable();
            $table->string('customer_address_03', 100)->nullable();
            $table->string('customer_address_04', 100)->nullable();
            $table->string('customer_address_05', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_address');
    }
}

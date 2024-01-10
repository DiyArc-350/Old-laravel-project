<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->integer('cart_id');
            $table->string('cart_code', 100)->nullable();
            $table->string('customer_number', 100)->nullable();
            $table->string('company_code', 100)->nullable();
            $table->string('product_code', 100)->nullable()->comment("Produk yang dibeli");
            $table->string('orders_code', 100)->nullable()->comment("Ini akan di update setelah Member Checkout");
            $table->integer('cart_quantity')->nullable()->comment("Jumlah barang");
            $table->string('cart_price_item', 100)->nullable()->comment("Harga satuan");
            $table->string('cart_price_subtotal', 100)->nullable()->comment("Harga sub total");
            $table->string('cart_note', 100)->nullable();
            $table->dateTime('cart_insertdate')->nullable();
            $table->integer('cart_insertby')->nullable();
            $table->dateTime('cart_updatedate')->nullable();
            $table->integer('cart_updateby')->nullable();
            $table->dateTime('cart_deletedate')->nullable();
            $table->integer('cart_deleteby')->nullable();
            $table->integer('cart_deletestatus')->nullable()->comment("1=DELETED; 0=NORMAL");
            $table->string('cart_01', 100)->nullable();
            $table->string('cart_02', 100)->nullable();
            $table->string('cart_03', 100)->nullable();
            $table->string('cart_04', 100)->nullable();
            $table->string('cart_05', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}

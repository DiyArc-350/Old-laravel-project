<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->integer('product_id');
            $table->string('product_category_code', 100)->nullable();
            $table->integer('discount_code')->nullable()->comment("Kode Diskon");
            $table->string('product_code', 100)->nullable();
            $table->string('product_name', 100)->nullable();
            $table->string('product_info', 100)->nullable();
            $table->integer('product_sort')->nullable();
            $table->string('product_sku', 100)->nullable()->comment("jenis ukuran, merk, warna, dan jenis.");
            $table->integer('product_price_purchase')->nullable()->comment("Harga Pembelian");
            $table->string('product_price_sell', 100)->nullable()->comment("Harga Penjualan");
            $table->integer('product_price_profit')->nullable()->comment("Harga Keuntungan");
            $table->string('product_visible', 100)->nullable()->comment("Produk Ditampilkan");
            $table->integer('product_stock')->nullable()->comment("Stok di Gudang ada berapa");
            $table->string('product_unit', 100)->nullable()->comment("Satuan Produk ( Biji, Karton )");
            $table->string('product_heavy', 100)->nullable()->comment("Berat Produk Gram");
            $table->binary('product_icon')->nullable()->comment("Gambar Ukuran Kecil / dikompres");
            $table->string('product_icon_fileext', 100)->nullable()->comment(".jpg");
            $table->string('product_icon_filename', 100)->nullable()->comment("Nama file");
            $table->string('product_icon_filesize', 100)->nullable()->comment("Ukuran berapa kilobyte");
            $table->string('product_icon_filetype', 100)->nullable()->comment("file/jpg");
            $table->string('product_icon_filemime', 100)->nullable();
            $table->binary('product_picture')->nullable()->comment("Gambar Ukuran Besar");
            $table->string('product_picture_filename', 100)->nullable()->comment("Nama file");
            $table->string('product_picture_filesize', 100)->nullable()->comment("Ukuran File");
            $table->string('product_picture_filetype', 100)->nullable()->comment("file/png");
            $table->string('product_picture_fileext', 100)->nullable()->comment(".png");
            $table->string('product_picture_filemime', 100)->nullable();
            $table->dateTime('product_insertdate')->nullable();
            $table->string('product_insertby', 100)->nullable();
            $table->dateTime('product_updatedate')->nullable();
            $table->integer('product_updateby')->nullable();
            $table->dateTime('product_deletedate')->nullable();
            $table->integer('product_deleteby')->nullable();
            $table->integer('product_deletestatus')->nullable();
            $table->string('product_01', 100)->nullable();
            $table->string('product_02', 100)->nullable();
            $table->string('product_03', 100)->nullable();
            $table->string('product_04', 100)->nullable();
            $table->string('product_05', 100)->nullable();
            $table->string('product_06', 100)->nullable();
            $table->string('product_07', 100)->nullable();
            $table->string('product_08', 100)->nullable();
            $table->string('product_09', 100)->nullable();
            $table->string('product_10', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}

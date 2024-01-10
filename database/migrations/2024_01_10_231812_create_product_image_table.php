<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_image', function (Blueprint $table) {
            $table->morphs('product_image');
            $table->string('product_image_code', 100)->nullable();
            $table->string('product_code', 100)->nullable();
            $table->string('product_image_sort', 100)->nullable()->comment("Urutan Gambar");
            $table->string('product_image_visible', 100)->nullable()->comment("1=VISIBLE; 0=NOT VISIBLE");
            $table->binary('product_image_small')->nullable()->comment("Gambar Ukuran Besar");
            $table->string('product_image_small_filename', 100)->nullable()->comment("Nama file");
            $table->string('product_image_small_filesize', 100)->nullable()->comment("Ukuran File");
            $table->string('product_image_small_filetype', 100)->nullable()->comment("file/png");
            $table->string('product_image_small_fileext', 100)->nullable()->comment(".png");
            $table->string('product_image_small_filemime', 100)->nullable();
            $table->binary('product_image_big')->nullable()->comment("Gambar Ukuran Besar");
            $table->string('product_image_big_filename', 100)->nullable()->comment("Nama file");
            $table->string('product_image_big_filesize', 100)->nullable()->comment("Ukuran File");
            $table->string('product_image_big_filetype', 100)->nullable()->comment("file/png");
            $table->string('product_image_big_fileext', 100)->nullable()->comment(".png");
            $table->string('product_image_big_filemime', 100)->nullable();
            $table->dateTime('product_image_insertdate')->nullable();
            $table->string('product_image_insertby', 100)->nullable();
            $table->dateTime('product_image_updatedate')->nullable();
            $table->integer('product_image_updateby')->nullable();
            $table->dateTime('product_image_deletedate')->nullable();
            $table->integer('product_image_deleteby')->nullable();
            $table->integer('product_image_deletestatus')->nullable();
            $table->string('product_image_01', 100)->nullable();
            $table->string('product_image_02', 100)->nullable();
            $table->string('product_image_03', 100)->nullable();
            $table->string('product_image_04', 100)->nullable();
            $table->string('product_image_05', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_image');
    }
}

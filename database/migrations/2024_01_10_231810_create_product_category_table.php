<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->integer('product_category_id');
            $table->string('company_code', 100)->nullable();
            $table->string('product_category_code', 100)->nullable();
            $table->string('product_category_parent', 100)->nullable();
            $table->string('product_category_name', 100)->nullable();
            $table->text('product_category_info')->nullable();
            $table->string('product_category_sort', 100)->nullable();
            $table->binary('product_category_icon')->nullable()->comment("Gambar Ukuran Kecil / dikompres");
            $table->string('product_category_icon_name', 100)->nullable()->comment("Nama file");
            $table->string('product_category_icon_size', 100)->nullable()->comment("Ukuran berapa kilobyte");
            $table->string('product_category_icon_filetype', 100)->nullable()->comment("file/jpg");
            $table->string('product_category_icon_ext', 100)->nullable()->comment(".jpg");
            $table->binary('product_category_picture')->nullable()->comment("Gambar Ukuran Besar");
            $table->string('product_category_picture_name', 100)->nullable()->comment("Nama file");
            $table->string('product_category_picture_size', 100)->nullable()->comment("Ukuran File");
            $table->string('product_category_picture_filetype', 100)->nullable()->comment("file/png");
            $table->string('product_category_picture_ext', 100)->nullable()->comment(".png");
            $table->dateTime('product_category_insertdate')->nullable();
            $table->string('product_category_insertby', 100)->nullable();
            $table->dateTime('product_category_updatedate')->nullable();
            $table->integer('product_category_updateby')->nullable();
            $table->dateTime('product_category_deletedate')->nullable();
            $table->integer('product_category_deleteby')->nullable();
            $table->integer('product_category_deletestatus')->nullable();
            $table->string('product_category_01', 100)->nullable();
            $table->string('product_category_02', 100)->nullable();
            $table->string('product_category_03', 100)->nullable();
            $table->string('product_category_04', 100)->nullable();
            $table->string('product_category_05', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->morphs('customer');
            $table->string('role_code', 100);
            $table->string('customer_number', 100)->nullable();
            $table->string('customer_fullname', 100)->nullable();
            $table->string('customer_username', 100)->nullable();
            $table->string('customer_passwd')->nullable();
            $table->string('customer_salt')->nullable();
            $table->string('customer_gender', 20)->nullable();
            $table->string('customer_pin', 10)->nullable();
            $table->string('customer_email', 100)->nullable();
            $table->string('customer_emailverified', 100)->nullable();
            $table->string('customer_emailotp', 100)->nullable();
            $table->string('customer_handphone1', 50)->nullable();
            $table->string('customer_handphone2', 50)->nullable();
            $table->string('customer_handphone3', 50)->nullable();
            $table->string('customer_otpcode', 10)->nullable();
            $table->string('customer_verified', 100)->nullable();
            $table->string('customer_verifiedby', 100)->nullable();
            $table->string('customer_category', 100)->nullable()->comment("GOLD/SILVER/PREMIUM");
            $table->date('customer_birthday')->nullable();
            $table->integer('customer_trialpaid')->nullable();
            $table->binary('customer_picture')->nullable()->comment("Gambar Ukuran Besar");
            $table->string('customer_picture_name', 100)->nullable()->comment("Nama file");
            $table->string('customer_picture_size', 100)->nullable()->comment("Ukuran File");
            $table->string('customer_picture_filetype', 100)->nullable()->comment("file/png");
            $table->string('customer_picture_ext', 100)->nullable()->comment(".png");
            $table->string('customer_picture_mime', 100)->nullable();
            $table->string('customer_notified_push', 100)->nullable();
            $table->string('customer_notified_email', 100)->nullable();
            $table->string('customer_notified_sms', 100)->nullable();
            $table->string('customer_notified_wa', 100)->nullable();
            $table->dateTime('customer_lastlogin')->nullable();
            $table->integer('customer_logincount')->nullable();
            $table->integer('customer_blocked')->nullable();
            $table->string('customer_blockedreason', 100)->nullable();
            $table->integer('customer_blockedby')->nullable();
            $table->dateTime('customer_insertdate')->nullable();
            $table->integer('customer_insertby')->nullable();
            $table->dateTime('customer_updatedate')->nullable();
            $table->integer('customer_updateby')->nullable();
            $table->dateTime('customer_deletedate')->nullable();
            $table->integer('customer_deleteby')->nullable();
            $table->integer('customer_deletestatus')->nullable()->comment("1=DELETED; 0=NORMAL");
            $table->string('customer_01', 100)->nullable();
            $table->string('customer_02', 100)->nullable();
            $table->string('customer_03', 100)->nullable();
            $table->string('customer_04', 100)->nullable();
            $table->string('customer_05', 100)->nullable();
            $table->string('customer_06', 100)->nullable();
            $table->string('customer_07', 100)->nullable();
            $table->string('customer_08', 100)->nullable();
            $table->string('customer_09', 100)->nullable();
            $table->string('customer_10', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}

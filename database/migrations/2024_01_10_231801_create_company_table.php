<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->integer('company_id');
            $table->string('company_code', 100)->nullable();
            $table->string('customer_number', 100)->nullable()->comment("Customer Number Penginput Pertama");
            $table->string('employee_number', 100)->nullable()->comment("Employee Number penginput pertama");
            $table->string('company_name', 100)->nullable();
            $table->string('company_website', 100)->nullable();
            $table->string('company_email', 100);
            $table->string('company_address', 100)->nullable();
            $table->string('company_province', 100)->nullable();
            $table->string('company_postcode', 100)->nullable();
            $table->string('company_phone', 100)->nullable();
            $table->string('company_handphone1', 100)->nullable();
            $table->string('company_priority', 100)->nullable()->comment("GOLD; SILVER; PLATINUM");
            $table->string('company_category', 100)->nullable()->comment("STARTUP; GOVERMENT; SWASTA");
            $table->string('company_handphone2', 100)->nullable();
            $table->string('company_handphone3', 100)->nullable();
            $table->string('company_industry', 100)->nullable();
            $table->binary('company_logo')->nullable();
            $table->string('company_logo_filename', 100)->nullable();
            $table->string('company_logo_filetype', 100)->nullable();
            $table->string('company_logo_filemime', 100)->nullable();
            $table->string('company_logo_fileext', 100)->nullable();
            $table->string('company_logo_filesize', 100)->nullable();
            $table->binary('company_icon')->nullable();
            $table->string('company_icon_filename', 100)->nullable();
            $table->string('company_icon_filetype', 100)->nullable();
            $table->string('company_icon_filemime', 100)->nullable();
            $table->string('company_icon_fileext', 100)->nullable();
            $table->string('company_icon_filesize', 100)->nullable();
            $table->dateTime('company_insertdate')->nullable();
            $table->integer('company_insertby')->nullable();
            $table->dateTime('company_updatedate')->nullable();
            $table->integer('company_updateby')->nullable();
            $table->dateTime('company_deletedate')->nullable();
            $table->integer('company_deleteby')->nullable();
            $table->integer('company_deletestatus')->nullable();
            $table->string('company_01', 100)->nullable();
            $table->string('company_02', 100)->nullable();
            $table->string('company_03', 100)->nullable();
            $table->string('company_04', 100)->nullable();
            $table->string('company_05', 100)->nullable();
            $table->string('company_06', 100)->nullable();
            $table->string('company_07', 100)->nullable();
            $table->string('company_08', 100)->nullable();
            $table->string('company_09', 100)->nullable();
            $table->string('company_10', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}

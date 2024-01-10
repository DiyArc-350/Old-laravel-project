<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->integer('employee_id');
            $table->string('role_code', 100)->nullable();
            $table->string('employee_number', 100)->nullable();
            $table->string('employee_name', 100)->nullable();
            $table->string('employee_position', 100)->nullable();
            $table->string('employee_departement', 100)->nullable();
            $table->string('employee_division', 100)->nullable();
            $table->string('employee_grade', 100)->nullable();
            $table->string('employee_email', 100)->nullable();
            $table->text('employee_passwd')->nullable();
            $table->string('employee_bank_name', 100)->nullable();
            $table->string('employee_bank_accountname', 100)->nullable();
            $table->string('employee_bank_accountnumber', 100)->nullable();
            $table->string('employee_workdate_start', 100)->nullable();
            $table->string('employee_workmonth', 100)->nullable();
            $table->string('employee_workdate_end', 100)->nullable();
            $table->date('employee_birthday')->nullable();
            $table->string('employee_gender', 100)->nullable();
            $table->string('employee_handphone1', 100)->nullable();
            $table->string('employee_handphone2', 100)->nullable();
            $table->string('employee_address', 100)->nullable();
            $table->string('employee_salary', 100)->nullable();
            $table->binary('employee_picture')->nullable()->comment("Gambar Ukuran Besar");
            $table->string('employee_picture_name', 100)->nullable()->comment("Nama file");
            $table->string('employee_picture_size', 100)->nullable()->comment("Ukuran File");
            $table->string('employee_picture_filetype', 100)->nullable()->comment("file/png");
            $table->string('employee_picture_ext', 100)->nullable()->comment(".png");
            $table->string('employee_picture_mime', 100)->nullable();
            $table->dateTime('employee_lastlogin')->nullable();
            $table->integer('employee_logincount')->nullable();
            $table->integer('employee_blocked')->nullable();
            $table->string('employee_blockedreason', 100)->nullable();
            $table->integer('employee_blockedby')->nullable();
            $table->string('employee_insertdate', 100)->nullable();
            $table->string('employee_insertby', 100)->nullable();
            $table->string('employee_updatedate', 100)->nullable();
            $table->string('employee_updateby', 100)->nullable();
            $table->string('employee_deletedate', 100)->nullable();
            $table->string('employee_deleteby', 100)->nullable();
            $table->string('employee_deletestatus', 100)->nullable();
            $table->string('employee_01', 100)->nullable();
            $table->string('employee_02', 100)->nullable();
            $table->string('employee_03', 100)->nullable();
            $table->string('employee_04', 100)->nullable();
            $table->string('employee_05', 100)->nullable();
            $table->string('employee_06', 100)->nullable();
            $table->string('employee_07', 100)->nullable();
            $table->string('employee_08', 100)->nullable();
            $table->string('employee_09', 100)->nullable();
            $table->string('employee_10', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}

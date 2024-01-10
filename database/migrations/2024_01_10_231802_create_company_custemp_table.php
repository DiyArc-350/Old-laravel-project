<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyCustempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_custemp', function (Blueprint $table) {
            $table->integer('company_custemp_id');
            $table->string('company_code', 100)->nullable()->comment("Kode Perusahaan");
            $table->string('customer_number', 100)->nullable()->comment("Nomor Pelanggan");
            $table->string('employee_number', 100)->nullable()->comment("Nomor Karyawan");
            $table->string('company_custemp_info', 100)->nullable();
            $table->string('company_custemp_sort', 100)->nullable();
            $table->dateTime('company_custemp_insertdate')->nullable();
            $table->string('company_custemp_insertby', 100)->nullable();
            $table->dateTime('company_custemp_updatedate')->nullable();
            $table->integer('company_custemp_updateby')->nullable();
            $table->dateTime('company_custemp_deletedate')->nullable();
            $table->integer('company_custemp_deleteby')->nullable();
            $table->integer('company_custemp_deletestatus')->nullable();
            $table->string('company_custemp_01', 100)->nullable();
            $table->string('company_custemp_02', 100)->nullable();
            $table->string('company_custemp_03', 100)->nullable();
            $table->string('company_custemp_04', 100)->nullable();
            $table->string('company_custemp_05', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_custemp');
    }
}

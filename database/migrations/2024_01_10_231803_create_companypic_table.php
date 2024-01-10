<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanypicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companypic', function (Blueprint $table) {
            $table->integer('companypic_id');
            $table->string('company_code', 100)->nullable();
            $table->string('customer_number', 100)->nullable()->comment("ID Penginput pertama dr sisi customer");
            $table->string('employee_number', 100)->nullable()->comment("ID Penginput pertama dr sisi employee");
            $table->string('companypic_name', 100)->nullable();
            $table->string('companypic_position', 100)->nullable();
            $table->string('companypic_departement', 100)->nullable();
            $table->string('companypic_division', 100)->nullable();
            $table->string('companypic_email', 100)->nullable();
            $table->string('companypic_phone', 100)->nullable();
            $table->string('companypic_handphone1', 100)->nullable();
            $table->string('companypic_handphone2', 100)->nullable();
            $table->dateTime('companypic_insertdate')->nullable();
            $table->integer('companypic_insertby')->nullable();
            $table->dateTime('companypic_updatedate')->nullable();
            $table->integer('companypic_updateby')->nullable();
            $table->dateTime('companypic_deletedate')->nullable();
            $table->integer('companypic_deleteby')->nullable();
            $table->integer('companypic_deletestatus')->nullable();
            $table->string('companypic_01', 100)->nullable();
            $table->string('companypic_02', 100)->nullable();
            $table->string('companypic_03', 100)->nullable();
            $table->string('companypic_04', 100)->nullable();
            $table->string('companypic_05', 100)->nullable();
            $table->string('companypic_06', 100)->nullable();
            $table->string('companypic_07', 100)->nullable();
            $table->string('companypic_08', 100)->nullable();
            $table->string('companypic_09', 100)->nullable();
            $table->string('companypic_10', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companypic');
    }
}

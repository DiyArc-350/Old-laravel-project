<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('orders_id');
            $table->string('orders_code', 100)->nullable();
            $table->string('customer_number', 100)->nullable()->comment("Nomor Pelanggan");
            $table->string('customer_address_code', 100)->nullable()->comment("Kode Alamat");
            $table->string('company_code', 100)->nullable()->comment("Kode Perusahaan");
            $table->string('discount_code', 100)->nullable();
            $table->date('orders_date')->nullable()->comment("Tanggal Pembelian");
            $table->dateTime('orders_datetime')->nullable()->comment("Waktu Pembelian");
            $table->string('orders_invoice', 100)->nullable()->comment("Nomor Invoice");
            $table->string('orders_shipping_code', 100)->nullable()->comment("Sicepat / Tiki / JNE");
            $table->string('orders_shipping_type', 100)->nullable()->comment("Tipe Kirim. 3JAM; 6JAM; 24JAM; BESOK SAMPE");
            $table->string('orders_shipping_tracking_code', 100)->nullable()->comment("Nomor Resi");
            $table->integer('orders_shipping_price')->nullable()->comment("Biaya Ongkir");
            $table->string('orders_shipping_price_discount', 100)->nullable()->comment("Diskon Biaya Ongkir");
            $table->string('orders_shipping_note1', 100)->nullable();
            $table->string('orders_shipping_note2', 100)->nullable();
            $table->string('orders_shipping_note3', 100)->nullable();
            $table->string('orders_shipping_note4', 100)->nullable();
            $table->string('orders_shipping_note5', 100)->nullable();
            $table->integer('orders_total_item')->nullable()->comment("Jumlah Item Barang");
            $table->string('orders_total_heavy', 100)->nullable()->comment("Total berat dalam Gram");
            $table->integer('orders_total_price')->nullable()->comment("Biaya Barang");
            $table->string('orders_status', 100)->nullable()->comment("Status Terakhir. 1=PAID; 2=PREPARED; 3=DIANTAR; 4=DITERIMA");
            $table->string('orders_payment_discount', 100)->nullable()->comment("Diskon Rupiah");
            $table->string('orders_payment_tax_percent', 100)->nullable()->comment("Persen Pajak");
            $table->string('orders_payment_tax_price', 100)->nullable()->comment("Biaya Pajak");
            $table->string('orders_payment_price', 100)->nullable()->comment("Biaya Belanja Semua");
            $table->string('orders_payment_status', 100)->nullable()->comment("Sudah Transfer / Belum");
            $table->string('orders_payment_insurance', 100)->nullable()->comment("Biaya Asuransi");
            $table->string('orders_payment_date', 100)->nullable()->comment("Tanggal Transfer");
            $table->string('orders_payment_method', 100)->nullable()->comment("Mandiri Virtual Account");
            $table->string('orders_payment_notified', 100)->nullable()->comment("Notifikasi ke Admin untuk status bayar");
            $table->string('orders_payment_note', 100)->nullable()->comment("Catatan dari Customer");
            $table->string('orders_payment_note1', 100)->nullable();
            $table->string('orders_payment_note2', 100)->nullable();
            $table->string('orders_payment_note3', 100)->nullable();
            $table->string('orders_payment_note4', 100)->nullable();
            $table->string('orders_payment_note5', 100)->nullable();
            $table->binary('orders_picture')->nullable()->comment("Bukti Transfer Ukuran Besar");
            $table->string('orders_picture_filename', 100)->nullable()->comment("Nama file");
            $table->string('orders_picture_filesize', 100)->nullable()->comment("Ukuran File");
            $table->string('orders_picture_filetype', 100)->nullable()->comment("file/png");
            $table->string('orders_picture_fileext', 100)->nullable()->comment(".png");
            $table->string('orders_picture_filemime', 100)->nullable();
            $table->dateTime('orders_insertdate')->nullable();
            $table->string('orders_insertby', 100)->nullable();
            $table->dateTime('orders_updatedate')->nullable();
            $table->integer('orders_updateby')->nullable();
            $table->dateTime('orders_deletedate')->nullable();
            $table->integer('orders_deleteby')->nullable();
            $table->integer('orders_deletestatus')->nullable();
            $table->string('orders_01', 100)->nullable();
            $table->string('orders_02', 100)->nullable();
            $table->string('orders_03', 100)->nullable();
            $table->string('orders_04', 100)->nullable();
            $table->string('orders_05', 100)->nullable();
            $table->string('orders_06', 100)->nullable();
            $table->string('orders_07', 100)->nullable();
            $table->string('orders_08', 100)->nullable();
            $table->string('orders_09', 100)->nullable();
            $table->string('orders_10', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_produks', function (Blueprint $table) {
            $table->string('kode_penjualan',6)->primary();
            $table->string('kode_produk',6);
            $table->integer('total_harga');
            $table->date('tanggal');
            $table->string('pic_teller',45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan_produks');
    }
}
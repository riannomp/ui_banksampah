<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualaProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjuala_produks', function (Blueprint $table) {
            $table->string('kode_penjualan',6)->primary();
            $table->string('kode_produk',6);
            $table->integer('total_harga');
            $table->date('tanggal');
            $table->string('pic_teller');
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
        Schema::dropIfExists('penjuala_produks');
    }
}

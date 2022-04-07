<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_sampahs', function (Blueprint $table) {
            $table->string('id_penjualan', 6)->primary();
            $table->string('id_pengrajin', 6);
            $table->integer('total_harga');
            $table->date('tanggal');
            $table->string('pic_teller', 45);
            $table->timestamps();
        });
        Schema::table('penjualan_sampahs', function (Blueprint $table) {
            $table->foreign('id_pengrajin', 'id_pengrajin_penjualan_sampah_fk01')->references('id_pengrajin')->on('pengrajins')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan_sampahs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailJualsampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_jualsampahs', function (Blueprint $table) {
            $table->increments('id_detail');
            $table->string('id_penjualan',6);
            $table->string('id_sampah',6);
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->integer('total');
            $table->timestamps();
        });
        Schema::table('detail_jualsampahs', function (Blueprint $table) {
            $table->foreign('id_sampah', 'id_sampah_detail_jual_fk01')->references('id_sampah')->on('sampahs')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('detail_jualsampahs', function (Blueprint $table) {
            $table->foreign('id_penjualan', 'id_penjualan_detail_jual_fk02')->references('id_penjualan')->on('penjualan_sampahs')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_jualsampahs');
    }
}

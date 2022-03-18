<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailJualproduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_jualproduks', function (Blueprint $table) {
            $table->increments('id_detail');
            $table->string('kode_penjualan',6);
            $table->string('nama_sampah',45);
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->integer('total');
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
        Schema::dropIfExists('detail_jualproduks');
    }
}

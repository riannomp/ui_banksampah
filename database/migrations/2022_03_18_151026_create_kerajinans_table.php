<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerajinansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerajinans', function (Blueprint $table) {
            $table->string('kode_produk',6)->primary();
            $table->string('kode_pengrajin',6);
            $table->string('nama',45);
            $table->integer('stok');
            $table->string('gambar',15);
            $table->integer('harga');
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
        Schema::dropIfExists('kerajinans');
    }
}

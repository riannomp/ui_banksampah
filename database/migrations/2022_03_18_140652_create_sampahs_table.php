<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sampahs', function (Blueprint $table) {
            $table->string('kode_sampah',6)->primary();
            $table->string('kode_jenis',6);
            $table->string('nama');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->string('gambar', 15);
            $table->timestamps();
        });
        Schema::table('sampahs', function (Blueprint $table) {
            $table->foreign('kode_jenis', 'kode_jenis_sampahs_fk01')->references('kode_jenis')->on('jenis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sampahs');
    }
}

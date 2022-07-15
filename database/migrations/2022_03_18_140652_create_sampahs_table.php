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
            $table->string('id_sampah',6)->primary();
            $table->string('id_jenis',6);
            $table->string('nama');
            $table->string('keterangan');
            $table->integer('harga_nasabah');
            $table->integer('harga_koordinator');
            $table->string('gambar', 15)->nullable();
            $table->timestamps();
        });
        Schema::table('sampahs', function (Blueprint $table) {
            $table->foreign('id_jenis', 'id_jenis_sampahs_fk01')->references('id_jenis')->on('jenis')->onDelete('cascade')->onUpdate('cascade');
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

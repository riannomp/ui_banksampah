<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->integer('id_nasabah')->nullable()->unsigned();
            $table->integer('id_koor')->nullable()->unsigned();
            $table->integer('penarikan')->nullable()->unsigned();
            $table->integer('setoran')->nullable()->unsigned();
            $table->integer('saldo')->nullable()->unsigned();
            $table->string('status',10);
            $table->timestamps();
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->foreign('id_nasabah', 'id_nasabah_fk01')->references('id_nasabah')->on('nasabahs')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('transaksis', function (Blueprint $table) {
            $table->foreign('id_koor', 'id_koor_fk02')->references('id_koor')->on('koordinators')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}

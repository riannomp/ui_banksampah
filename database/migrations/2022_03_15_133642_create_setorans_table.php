<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetoransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setorans', function (Blueprint $table) {
            $table->string('kode_setor',6)->primary();
            $table->string('kode_nasabah',6);
            $table->string('kode_koor',6);
            $table->integer('total_harga');
            $table->date('tanggal');
            $table->timestamps();
        });
        // Schema::table('setorans', function (Blueprint $table) {
        //     $table->foreign('kode_nasabah', 'kode_nasabah_setorans_fk01')->references('kode_nasabah')->on('nasabahs')->onDelete('cascade')->onUpdate('cascade');
        // });
        // Schema::table('setorans', function (Blueprint $table) {
        //     $table->foreign('kode_koor', 'kode_koor_setorans_fk02')->references('kode_koor')->on('koordinators')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setorans');
    }
}

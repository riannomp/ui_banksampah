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
            $table->string('id_setoran',6)->primary();
            $table->integer('id_nasabah')->unsigned()->nullable();
            $table->integer('id_koor')->unsigned()->nullable();
            $table->integer('status')->unsigned();
            $table->integer('total_harga')->nullable()->unsigned();
            $table->integer('total_koor')->nullable()->unsigned();
            $table->date('tanggal');
            $table->timestamps();
        });
        Schema::table('setorans', function (Blueprint $table) {
            $table->foreign('id_nasabah', 'id_nasabah_setorans_fk01')->references('id_nasabah')->on('nasabahs')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('setorans', function (Blueprint $table) {
            $table->foreign('id_koor', 'id_koor_setorans_fk02')->references('id_koor')->on('koordinators')->onDelete('cascade')->onUpdate('cascade');
        });
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

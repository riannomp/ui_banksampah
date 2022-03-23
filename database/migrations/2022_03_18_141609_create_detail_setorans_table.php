<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSetoransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_setorans', function (Blueprint $table) {
            $table->increments('id_detail');
            $table->string('kode_setor',6);
            $table->string('kode_sampah',6);
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->integer('total');
            $table->timestamps();
        });
        Schema::table('detail_setorans', function (Blueprint $table) {
            $table->foreign('kode_setor', 'kode_setor_detail_setorans_fk01')->references('kode_setor')->on('setorans')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('detail_setorans', function (Blueprint $table) {
            $table->foreign('kode_sampah', 'kode_sampah_detail_setorans_fk02')->references('kode_sampah')->on('sampahs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_setorans');
    }
}

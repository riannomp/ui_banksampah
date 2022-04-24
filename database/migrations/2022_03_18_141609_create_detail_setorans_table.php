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
            $table->string('id_setoran',6);
            $table->string('id_sampah',6);
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->timestamps();
        });
        Schema::table('detail_setorans', function (Blueprint $table) {
            $table->foreign('id_setoran', 'id_setoran_detail_setorans_fk01')->references('id_setoran')->on('setorans')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('detail_setorans', function (Blueprint $table) {
            $table->foreign('id_sampah', 'id_sampah_detail_setorans_fk02')->references('id_sampah')->on('sampahs')->onDelete('cascade')->onUpdate('cascade');
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

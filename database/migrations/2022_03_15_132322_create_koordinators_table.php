<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoordinatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koordinators', function (Blueprint $table) {
            $table->string('kode_koor',6)->primary();
            $table->integer('id_user')->unsigned();
            $table->string('nama',50);
            $table->string('foto',15)->nullable();
            $table->text('alamat');
            $table->string('no_telp',15);
            $table->timestamps();
        });
        Schema::table('koordinators', function (Blueprint $table) {
            $table->foreign('id_user', 'id_user_koordinators_fk01')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koordinators');
    }
}

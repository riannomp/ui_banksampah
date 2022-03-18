<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasabahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nasabahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->string('nama',50);
            $table->string('nik',16)->nullable();
            $table->string('foto',15)->nullable();
            $table->text('alamat');
            $table->string('no_telp',15);
            $table->string('saldo',10)->nullable();
            $table->string('penarikan',10)->nullable();
            $table->timestamps();
        });
        Schema::table('nasabahs', function (Blueprint $table) {
            $table->foreign('id_user', 'id_user_nasabahs_fk01')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nasabahs');
    }
}

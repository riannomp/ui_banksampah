<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->integer('id_karyawan')->nullable()->unsigned();
            $table->integer('id_nasabah')->nullable()->unsigned();
            $table->integer('id_koor')->nullable()->unsigned();
            $table->string('level');
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',64);
            $table->integer('status');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_karyawan', 'id_karyawan_fk01')->references('id_karyawan')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_nasabah', 'id_nasabah_fk02')->references('id_nasabah')->on('nasabahs')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_koor', 'id_koor_fk03')->references('id_koor')->on('koordinators')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

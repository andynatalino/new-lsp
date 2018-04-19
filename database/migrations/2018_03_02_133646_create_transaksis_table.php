<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
        $table->increments('id');
        $table->integer('id_user')->unsigned()->nullable();
        $table->integer('id_jadwal')->unsigned()->nullable();
        $table->integer('id_pembayaran')->unsigned()->nullable();        
        $table->integer('id_userdata')->unsigned()->nullable();
        $table->datetime('tanggal')->nullable();    

        $table->string('nama_pengirim')->nullable();
        $table->string('asal_bank')->nullable();
        $table->string('kode_transfer')->nullable();
        $table->string('photo_bukti')->nullable();
        
        $table->integer('tunai')->default(1)->nullable();
        $table->integer('status')->default(1)->nullable();
        $table->timestamps();

        $table->foreign('id_user')->references('id')
        ->on('users')->onDelete('cascade');
        $table->foreign('id_jadwal')->references('id')
        ->on('jadwals')->onDelete('cascade');
        $table->foreign('id_pembayaran')->references('id')
        ->on('pembayarans')->onDelete('cascade');
        $table->foreign('id_userdata')->references('id')
        ->on('userdatas')->onDelete('cascade');
    });
     DB::update("ALTER TABLE transaksis AUTO_INCREMENT = 1000;");
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

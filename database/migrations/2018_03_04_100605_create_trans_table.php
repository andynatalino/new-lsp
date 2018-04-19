<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('trans', function (Blueprint $table) {
        $table->increments('id');
        $table->string('id_transaksi');
        $table->string('user');
        $table->string('user_id');
        $table->string('jadwal');
        $table->string('kategori');
        $table->string('pembayaran');        
        $table->string('id_userdata');
        $table->datetime('tanggal_pesan');
        $table->datetime('tanggal_konfirmasi');

        $table->string('nama_pengirim');
        $table->string('asal_bank');
        $table->string('kode_transfer');
        $table->string('photo_bukti');

        $table->string('tunai');
        $table->string('status')->nullable();
        $table->string('notifikasi')->default(1)->nullable();
        $table->timestamps();
    });
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('trans');
  }
}

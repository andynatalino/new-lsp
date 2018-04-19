<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomoridentitas')->nullable();
            $table->string('namalengkap')->nullable();
            $table->string('tempatlahir')->nullable();
            $table->string('tanggallahir')->nullable();
            $table->string('jeniskelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('telp')->nullable();
            $table->string('instansi')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('nama')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->string('email_perusahaan')->nullable();
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
        Schema::dropIfExists('userdatas');
    }
}

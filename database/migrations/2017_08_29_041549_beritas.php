<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Beritas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('beritas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_user')->unsigned();
          $table->string('judul');
          $table->string('slug');
          $table->longtext('isi');
          $table->timestamps();

          $table->foreign('id_user')->references('id')
          ->on('users')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beritas');
    }
}

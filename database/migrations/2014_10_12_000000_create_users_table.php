<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('number')->nullable();
            $table->string('username');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->string('place')->nullable();
            $table->string('date')->nullable();
            $table->string('religion')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('address')->nullable();
            $table->string('telp')->nullable();
            $table->string('instansi')->nullable();
            $table->string('photo')->nullable();
            $table->tinyInteger('role')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

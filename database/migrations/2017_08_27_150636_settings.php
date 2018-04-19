<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('settings', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nama_web')->nullable();
        $table->string('title')->nullable();
        $table->string('email')->nullable();
        $table->string('meta_title')->nullable();
        $table->text('meta_description')->nullable();
        $table->text('meta_keywords')->nullable();
        $table->string('google_site_verification')->nullable();
        $table->string('bing')->nullable();
        $table->string('color_web')->nullable()->default('blue');
        $table->string('color_admin')->nullable()->default('skin-blue');
        $table->string('color_operator')->nullable()->default('skin-blue');
        $table->string('facebook')->nullable();
        $table->string('twitter')->nullable();
        $table->string('instagram')->nullable();
        $table->string('logo')->nullable();
        $table->string('favicon')->nullable();
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
      Schema::dropIfExists('settings');
  }
}

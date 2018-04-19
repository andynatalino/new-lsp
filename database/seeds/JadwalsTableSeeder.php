<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;


class JadwalsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $i = 1;
    $k = 100;
    $m = 10000;
    $faker = Faker::create();
    foreach (range(1,100) as $index) {
      DB::table('jadwals')->insert([
        'id_kategori' =>  $i++,
        'nama' => $faker->firstNameMale ,
        'tanggal_mulai' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'tanggal_selesai' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'waktu' => $faker->time($format = 'H:i:s', $max = 'now'),
        'lokasi' => $faker->address,
        'kuota' => $k++,
        'biaya' => $m++,
        'isi' => $faker->text($maxNbChars = 200),
        'status' => 1,
        'slug' => strtolower(str_slug($faker->name)),
        'info' => $faker->text($maxNbChars = 200),
        'skema' => $faker->text($maxNbChars = 200),
      ]);
    }
  }
}

<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class KategorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    	
    	$faker = Faker::create();
    	foreach (range(1,100) as $index) {
    		DB::table('kategoris')->insert([
    			'nama_sp' => $faker->name,
    			'isi' => $faker->text($maxNbChars = 200),
    			'slug' => strtolower(str_slug($faker->name)),			
    			'image' => 'dummy.jpg',
    		]);
    	}
    }
}

<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('settings')->insert([    		
    		'nama_web' => 'Website',
    		'title' => 'Title',
            'email' => 'Example@email.com',
            'alamat' => 'alamat',
            'telp' => '000',
            'jam_buka' => 'jam_buka',
            'maps_location' => 'maps_location',
            'meta_title' => 'title',
            'meta_description' => 'description',
            'meta_keywords' => 'keywords',
            'google_site_verification' => 'google',
            'bing' => 'bing',
    		'color_admin' => 'skin-blue',
    		'color_operator' => 'skin-blue',
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'instagram' => 'instagram',
            'youtube' => 'youtube',
    	]);
    }
}

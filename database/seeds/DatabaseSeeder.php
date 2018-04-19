<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $this->call(UsersTableSeeder::class);
     $this->call(SettingsTableSeeder::class);
     $this->call(TentangsTableSeeder::class);
     $this->call(KategorisTableSeeder::class);
     $this->call(JadwalsTableSeeder::class);
     $this->call(PembayaransTableSeeder::class);
   }   
 }

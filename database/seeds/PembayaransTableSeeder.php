<?php

use Illuminate\Database\Seeder;

class PembayaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('pembayarans')->insert([    		
    		'nama_bank' => 'Bank BCA',
    		'no_rek' => '1234567890',
    		'atas_nama' => 'Sakasakti',
    	]);
    	DB::table('pembayarans')->insert([    		
    		'nama_bank' => 'Bank Mandiri',
    		'no_rek' => '999999999',
    		'atas_nama' => 'Sakasakti',
    	]);
    	DB::table('pembayarans')->insert([    		
    		'nama_bank' => 'Bank BNI',
    		'no_rek' => '77777777',
    		'atas_nama' => 'Sakasakti',
    	]);
    }
}

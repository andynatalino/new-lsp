<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([    		
    		'number' => '1234567890',
    		'username' => 'admin',
    		'name' => 'admin',
    		'email' => 'admin@admin.com',
    		'password' => '$2y$10$FvVAHgbKxm226r94HUFIDuvZeWx6ddCHkcA032Eeq.lPfT7oZoedu',   
    		'role' => '2',
    	]);

        DB::table('users')->insert([            
            'number' => '99999999',
            'username' => 'operator',
            'name' => 'operator',
            'email' => 'operator@operator.com',
            'password' => '$2y$10$CmhtuUx3WMi2xQIoRIQn9O1/mLKdLwI0/Cns0SLfUXE0I1bhmtqLO',   
            'role' => '3',
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clients')->delete();
        
        \DB::table('clients')->insert(array (
            0 => 
            array (
                'first_name' => 'victror',
                'last_name' => 'Ludeño',
                'company_name' => 'tech',
                'email' => 'vhl@admin.com',
                'phone' => '228',
                'website' => 'www.tech.com',
                'skype' => NULL,
                'country' => 'Bolivia',
                'created_at' => NULL,
                'updated_at' => '2018-08-03 03:02:01.507',
                'client_status_id' => '2',
            ),
            1 => 
            array (
                'first_name' => 'pepe',
                'last_name' => 'santo',
                'company_name' => 'ee',
                'email' => 'admin@admin.com',
                'phone' => '2222',
                'website' => NULL,
                'skype' => NULL,
                'country' => NULL,
                'created_at' => '2018-08-03 04:04:57.670',
                'updated_at' => '2018-08-03 04:04:57.670',
                'client_status_id' => '1',
            ),
        ));
        
        
    }
}
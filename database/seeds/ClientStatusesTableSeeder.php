<?php

use Illuminate\Database\Seeder;

class ClientStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('client_statuses')->delete();
        
        \DB::table('client_statuses')->insert(array (
            0 => 
            array (
                'id' => '1',
                'title' => 'Activo',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => '2',
                'title' => 'Inactivo',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => '3',
                'title' => 'Suspendido',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
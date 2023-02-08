<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LabelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('labels')->delete();
        
        \DB::table('labels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'board_id' => 2,
                'name' => 'Api',
                'created_at' => '2023-02-06 07:19:00',
                'updated_at' => '2023-02-06 07:19:00',
            ),
            1 => 
            array (
                'id' => 2,
                'board_id' => 2,
                'name' => 'Website',
                'created_at' => '2023-02-06 07:19:10',
                'updated_at' => '2023-02-06 07:19:10',
            ),
            2 => 
            array (
                'id' => 3,
                'board_id' => 2,
                'name' => 'Dashboard',
                'created_at' => '2023-02-06 07:19:25',
                'updated_at' => '2023-02-06 07:19:25',
            ),
            3 => 
            array (
                'id' => 4,
                'board_id' => 2,
                'name' => 'Android',
                'created_at' => '2023-02-06 07:19:37',
                'updated_at' => '2023-02-06 07:19:37',
            ),
            4 => 
            array (
                'id' => 5,
                'board_id' => 2,
                'name' => 'iOS',
                'created_at' => '2023-02-06 07:19:45',
                'updated_at' => '2023-02-06 07:19:45',
            ),
        ));
        
        
    }
}
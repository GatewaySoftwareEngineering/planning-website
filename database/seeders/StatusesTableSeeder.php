<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statuses')->delete();
        
        \DB::table('statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'board_id' => 2,
                'name' => 'to-do',
                'created_at' => '2023-02-06 08:23:56',
                'updated_at' => '2023-02-06 08:23:56',
            ),
            1 => 
            array (
                'id' => 2,
                'board_id' => 2,
                'name' => 'in-progress',
                'created_at' => '2023-02-06 08:24:33',
                'updated_at' => '2023-02-06 08:24:33',
            ),
            2 => 
            array (
                'id' => 3,
                'board_id' => 2,
                'name' => 'dev-review',
                'created_at' => '2023-02-06 08:24:46',
                'updated_at' => '2023-02-06 08:24:46',
            ),
            3 => 
            array (
                'id' => 4,
                'board_id' => 2,
                'name' => 'testing',
                'created_at' => '2023-02-06 08:25:06',
                'updated_at' => '2023-02-06 08:25:06',
            ),
            4 => 
            array (
                'id' => 5,
                'board_id' => 2,
                'name' => 'done',
                'created_at' => '2023-02-06 08:25:21',
                'updated_at' => '2023-02-06 08:25:21',
            ),
            5 => 
            array (
                'id' => 6,
                'board_id' => 2,
                'name' => 'close',
                'created_at' => '2023-02-06 08:25:26',
                'updated_at' => '2023-02-06 08:25:26',
            ),
        ));
        
        
    }
}
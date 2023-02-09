<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BoardUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('board_user')->delete();
        
        \DB::table('board_user')->insert(array (
            0 => 
            array (
                'id' => 1,
                'board_id' => 5,
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 7,
                'board_id' => 13,
                'user_id' => 1,
                'created_at' => '2023-02-05 16:10:08',
                'updated_at' => '2023-02-05 16:10:08',
            ),
            2 => 
            array (
                'id' => 8,
                'board_id' => 2,
                'user_id' => 1,
                'created_at' => '2023-02-06 06:56:45',
                'updated_at' => '2023-02-06 06:56:45',
            ),
            3 => 
            array (
                'id' => 9,
                'board_id' => 2,
                'user_id' => 3,
                'created_at' => '2023-02-06 07:14:45',
                'updated_at' => '2023-02-06 07:14:45',
            ),
            4 => 
            array (
                'id' => 10,
                'board_id' => 2,
                'user_id' => 4,
                'created_at' => '2023-02-06 07:14:49',
                'updated_at' => '2023-02-06 07:14:49',
            ),
            5 => 
            array (
                'id' => 11,
                'board_id' => 4,
                'user_id' => 3,
                'created_at' => '2023-02-08 11:57:30',
                'updated_at' => '2023-02-08 11:57:30',
            ),
        ));
        
        
    }
}
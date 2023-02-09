<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BoardsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('boards')->delete();
        
        \DB::table('boards')->insert(array (
            0 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'name' => 'Project 1',
                'description' => 'First project',
                'created_at' => '2023-02-05 12:08:58',
                'updated_at' => '2023-02-05 14:11:34',
            ),
            1 => 
            array (
                'id' => 4,
                'user_id' => 2,
                'name' => 'Project 1',
                'description' => 'First project',
                'created_at' => '2023-02-05 12:58:21',
                'updated_at' => '2023-02-05 12:58:21',
            ),
            2 => 
            array (
                'id' => 5,
                'user_id' => 2,
                'name' => 'Project 2',
                'description' => 'Second project',
                'created_at' => '2023-02-05 12:59:38',
                'updated_at' => '2023-02-05 12:59:38',
            ),
            3 => 
            array (
                'id' => 13,
                'user_id' => 1,
                'name' => 'project 2',
                'description' => 'Second project',
                'created_at' => '2023-02-05 16:10:08',
                'updated_at' => '2023-02-05 16:10:08',
            ),
        ));
        
        
    }
}
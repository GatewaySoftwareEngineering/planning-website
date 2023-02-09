<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_status')->delete();
        
        \DB::table('role_status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 2,
                'status_id' => 2,
                'can_be_assigned' => 1,
                'can_move' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'role_id' => 2,
                'status_id' => 1,
                'can_be_assigned' => 0,
                'can_move' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'role_id' => 2,
                'status_id' => 3,
                'can_be_assigned' => 1,
                'can_move' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'role_id' => 2,
                'status_id' => 4,
                'can_be_assigned' => 0,
                'can_move' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'role_id' => 3,
                'status_id' => 4,
                'can_be_assigned' => 1,
                'can_move' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'role_id' => 3,
                'status_id' => 3,
                'can_be_assigned' => 0,
                'can_move' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'role_id' => 3,
                'status_id' => 5,
                'can_be_assigned' => 0,
                'can_move' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'role_id' => 5,
                'status_id' => 2,
                'can_be_assigned' => 1,
                'can_move' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'role_id' => 5,
                'status_id' => 3,
                'can_be_assigned' => 1,
                'can_move' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'role_id' => 5,
                'status_id' => 4,
                'can_be_assigned' => 1,
                'can_move' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'role_id' => 5,
                'status_id' => 5,
                'can_be_assigned' => 1,
                'can_move' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'role_id' => 5,
                'status_id' => 6,
                'can_be_assigned' => 1,
                'can_move' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
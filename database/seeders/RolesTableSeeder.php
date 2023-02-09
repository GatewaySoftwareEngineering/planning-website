<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Admin',
                'created_at' => '2023-02-05 08:44:01',
                'updated_at' => '2023-02-05 08:52:28',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'developer',
                'display_name' => 'Developer',
                'created_at' => '2023-02-05 08:44:46',
                'updated_at' => '2023-02-05 08:44:46',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'tester',
                'display_name' => 'Tester',
                'created_at' => '2023-02-05 08:44:56',
                'updated_at' => '2023-02-05 08:44:56',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'product_owner',
                'display_name' => 'Product owner',
                'created_at' => '2023-02-05 08:49:05',
                'updated_at' => '2023-02-05 08:49:05',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'test',
                'display_name' => 'Test role',
                'created_at' => '2023-02-05 09:05:20',
                'updated_at' => '2023-02-05 09:05:20',
            ),
        ));
        
        
    }
}
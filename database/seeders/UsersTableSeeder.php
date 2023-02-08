<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Dima',
                'active' => 1,
                'email' => 'dimaaljammal9410@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$w752.gXZRjOIgKcEjZgTke.RvNZXanP24RHuIRCF/4wncdc5udEje',
                'remember_token' => NULL,
                'created_at' => '2023-02-05 12:08:36',
                'updated_at' => '2023-02-05 12:08:36',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 5,
                'name' => 'Product owner',
                'active' => 1,
                'email' => 'product_ower@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$5otEzYyA3SFuOMHDSVq8xuVB8RQNFn0o65nZTXt4/F296.RAq5d5S',
                'remember_token' => NULL,
                'created_at' => '2023-02-05 09:44:02',
                'updated_at' => '2023-02-05 09:44:02',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 2,
                'name' => 'Developer',
                'active' => 1,
                'email' => 'developer@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$v/S3OY2MBYLGXEWwTN.O3Od9hDhiYoyMoFiTHtw5YzaWwpz7Dqpky',
                'remember_token' => NULL,
                'created_at' => '2023-02-05 09:45:18',
                'updated_at' => '2023-02-05 09:45:18',
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 3,
                'name' => 'Tester',
                'active' => 1,
                'email' => 'tester@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$0vT/E7FS/BxZGzMv9BixXOaCOmCxN4flhEMAziILYoiTV927FLln.',
                'remember_token' => NULL,
                'created_at' => '2023-02-05 09:45:37',
                'updated_at' => '2023-02-05 09:45:37',
            ),
        ));
        
        
    }
}
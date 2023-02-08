<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'browse_permission',
                'display_name' => 'Browse permissions',
                'entity_name' => 'permissions',
                'created_at' => '2023-02-05 08:00:39',
                'updated_at' => '2023-02-05 08:00:39',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'show_permission',
                'display_name' => 'Show permission',
                'entity_name' => 'permissions',
                'created_at' => '2023-02-05 08:00:57',
                'updated_at' => '2023-02-05 08:00:57',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'create_permission',
                'display_name' => 'Create permission',
                'entity_name' => 'permissions',
                'created_at' => '2023-02-05 08:01:11',
                'updated_at' => '2023-02-05 08:01:11',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'update_permission',
                'display_name' => 'Update permission',
                'entity_name' => 'permissions',
                'created_at' => '2023-02-05 08:01:26',
                'updated_at' => '2023-02-05 08:01:26',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'delete_permission',
                'display_name' => 'Delete permission',
                'entity_name' => 'permissions',
                'created_at' => '2023-02-05 08:01:43',
                'updated_at' => '2023-02-05 08:01:43',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'browse_role',
                'display_name' => 'Browse roles',
                'entity_name' => 'roles',
                'created_at' => '2023-02-05 08:02:05',
                'updated_at' => '2023-02-05 08:02:05',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'show_role',
                'display_name' => 'Show role',
                'entity_name' => 'roles',
                'created_at' => '2023-02-05 08:02:20',
                'updated_at' => '2023-02-05 08:02:20',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'create_role',
                'display_name' => 'Create role',
                'entity_name' => 'roles',
                'created_at' => '2023-02-05 08:04:05',
                'updated_at' => '2023-02-05 08:04:05',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'update_role',
                'display_name' => 'Update role',
                'entity_name' => 'roles',
                'created_at' => '2023-02-05 08:04:17',
                'updated_at' => '2023-02-05 08:04:17',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'delete_role',
                'display_name' => 'Delete role',
                'entity_name' => 'roles',
                'created_at' => '2023-02-05 08:04:28',
                'updated_at' => '2023-02-05 08:04:28',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'browse_user',
                'display_name' => 'Browse users',
                'entity_name' => 'users',
                'created_at' => '2023-02-05 08:04:53',
                'updated_at' => '2023-02-05 08:04:53',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'show_user',
                'display_name' => 'Show user',
                'entity_name' => 'users',
                'created_at' => '2023-02-05 08:05:08',
                'updated_at' => '2023-02-05 08:05:08',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'create_user',
                'display_name' => 'Create user',
                'entity_name' => 'users',
                'created_at' => '2023-02-05 08:06:13',
                'updated_at' => '2023-02-05 08:06:13',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'update_user',
                'display_name' => 'Update user',
                'entity_name' => 'users',
                'created_at' => '2023-02-05 08:06:29',
                'updated_at' => '2023-02-05 08:06:29',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'delete_user',
                'display_name' => 'Delete user',
                'entity_name' => 'users',
                'created_at' => '2023-02-05 08:06:42',
                'updated_at' => '2023-02-05 08:06:42',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'browse_board',
                'display_name' => 'Browse boards',
                'entity_name' => 'boards',
                'created_at' => '2023-02-05 08:07:11',
                'updated_at' => '2023-02-05 08:07:11',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'show_board',
                'display_name' => 'Show board',
                'entity_name' => 'boards',
                'created_at' => '2023-02-05 08:07:27',
                'updated_at' => '2023-02-05 08:07:27',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'create_board',
                'display_name' => 'Create board',
                'entity_name' => 'boards',
                'created_at' => '2023-02-05 08:07:38',
                'updated_at' => '2023-02-05 08:07:38',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'update_board',
                'display_name' => 'Update board',
                'entity_name' => 'boards',
                'created_at' => '2023-02-05 08:07:52',
                'updated_at' => '2023-02-05 08:07:52',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'delete_board',
                'display_name' => 'Delete board',
                'entity_name' => 'boards',
                'created_at' => '2023-02-05 08:08:06',
                'updated_at' => '2023-02-05 08:08:06',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'browse_status',
                'display_name' => 'Browse statuses',
                'entity_name' => 'statuses',
                'created_at' => '2023-02-05 08:08:53',
                'updated_at' => '2023-02-05 08:08:53',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'show_status',
                'display_name' => 'Show status',
                'entity_name' => 'statuses',
                'created_at' => '2023-02-05 08:09:11',
                'updated_at' => '2023-02-05 08:09:11',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'create_status',
                'display_name' => 'Create status',
                'entity_name' => 'statuses',
                'created_at' => '2023-02-05 08:09:23',
                'updated_at' => '2023-02-05 08:09:23',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'update_status',
                'display_name' => 'Update status',
                'entity_name' => 'statuses',
                'created_at' => '2023-02-05 08:09:35',
                'updated_at' => '2023-02-05 08:09:35',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'delete_status',
                'display_name' => 'Delete status',
                'entity_name' => 'statuses',
                'created_at' => '2023-02-05 08:09:49',
                'updated_at' => '2023-02-05 08:09:49',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'browse_label',
                'display_name' => 'Browse labels',
                'entity_name' => 'labels',
                'created_at' => '2023-02-05 08:10:22',
                'updated_at' => '2023-02-05 08:10:22',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'show_label',
                'display_name' => 'Show label',
                'entity_name' => 'labels',
                'created_at' => '2023-02-05 08:10:47',
                'updated_at' => '2023-02-05 08:10:47',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'create_label',
                'display_name' => 'Create label',
                'entity_name' => 'labels',
                'created_at' => '2023-02-05 08:11:01',
                'updated_at' => '2023-02-05 08:11:01',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'update_label',
                'display_name' => 'Update label',
                'entity_name' => 'labels',
                'created_at' => '2023-02-05 08:11:13',
                'updated_at' => '2023-02-05 08:11:13',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'delete_label',
                'display_name' => 'Delete label',
                'entity_name' => 'labels',
                'created_at' => '2023-02-05 08:11:26',
                'updated_at' => '2023-02-05 08:11:26',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'browse_task',
                'display_name' => 'Browse tasks',
                'entity_name' => 'tasks',
                'created_at' => '2023-02-05 08:11:51',
                'updated_at' => '2023-02-05 08:11:51',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'show_task',
                'display_name' => 'Show task',
                'entity_name' => 'tasks',
                'created_at' => '2023-02-05 08:12:05',
                'updated_at' => '2023-02-05 08:12:05',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'create_task',
                'display_name' => 'Create task',
                'entity_name' => 'tasks',
                'created_at' => '2023-02-05 08:12:22',
                'updated_at' => '2023-02-05 08:12:22',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'update_task',
                'display_name' => 'Update task',
                'entity_name' => 'tasks',
                'created_at' => '2023-02-05 08:12:36',
                'updated_at' => '2023-02-05 08:12:36',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'delete_task',
                'display_name' => 'Delete  task',
                'entity_name' => 'tasks',
                'created_at' => '2023-02-05 08:12:50',
                'updated_at' => '2023-02-05 08:12:50',
            ),
            35 => 
            array (
                'id' => 52,
                'name' => 'invite_user_to_board',
                'display_name' => 'Invite user to board',
                'entity_name' => 'boards',
                'created_at' => '2023-02-06 06:31:24',
                'updated_at' => '2023-02-06 06:31:24',
            ),
            36 => 
            array (
                'id' => 56,
                'name' => 'test',
                'display_name' => 'Test permission',
                'entity_name' => 'tests',
                'created_at' => '2023-02-07 15:23:28',
                'updated_at' => '2023-02-07 15:23:28',
            ),
            37 => 
            array (
                'id' => 57,
                'name' => 'move_task',
                'display_name' => 'Move the task to another status',
                'entity_name' => 'tasks',
                'created_at' => '2023-02-07 09:37:58',
                'updated_at' => '2023-02-07 09:37:58',
            ),
            38 => 
            array (
                'id' => 58,
                'name' => 'assign_task',
                'display_name' => 'Assign a task to user',
                'entity_name' => 'tasks',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 59,
                'name' => 'view_log_task',
                'display_name' => 'View a task log',
                'entity_name' => 'tasks',
                'created_at' => '2023-02-08 12:34:10',
                'updated_at' => '2023-02-08 12:34:10',
            ),
        ));
        
        
    }
}
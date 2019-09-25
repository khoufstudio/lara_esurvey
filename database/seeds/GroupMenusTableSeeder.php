<?php

use Illuminate\Database\Seeder;

class GroupMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('group_menus')->delete();
        
        \DB::table('group_menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_user_group' => 1,
                'id_menu' => 2,
                'role' => 'ACRUD',
                'created_at' => '2019-03-25 16:14:26',
                'updated_at' => '2019-03-25 17:23:31',
            ),
            1 => 
            array (
                'id' => 2,
                'id_user_group' => 1,
                'id_menu' => 1,
                'role' => 'ACR',
                'created_at' => '2019-03-25 17:28:31',
                'updated_at' => '2019-03-25 17:28:38',
            ),
            2 => 
            array (
                'id' => 3,
                'id_user_group' => 1,
                'id_menu' => 3,
                'role' => 'ACRUD',
                'created_at' => '2019-03-25 17:30:14',
                'updated_at' => '2019-03-25 17:30:18',
            ),
            3 => 
            array (
                'id' => 4,
                'id_user_group' => 1,
                'id_menu' => 4,
                'role' => 'ACR',
                'created_at' => '2019-03-25 17:31:27',
                'updated_at' => '2019-03-25 17:31:29',
            ),
            4 => 
            array (
                'id' => 5,
                'id_user_group' => 1,
                'id_menu' => 5,
                'role' => 'ACRUD',
                'created_at' => '2019-03-25 17:33:10',
                'updated_at' => '2019-03-25 17:33:13',
            ),
            5 => 
            array (
                'id' => 6,
                'id_user_group' => 1,
                'id_menu' => 6,
                'role' => 'ACR',
                'created_at' => '2019-03-25 17:33:14',
                'updated_at' => '2019-03-25 17:33:16',
            ),
            6 => 
            array (
                'id' => 8,
                'id_user_group' => 1,
                'id_menu' => 8,
                'role' => 'ACRUD',
                'created_at' => '2019-03-28 04:21:32',
                'updated_at' => '2019-03-28 04:21:42',
            ),
            7 => 
            array (
                'id' => 10,
                'id_user_group' => 1,
                'id_menu' => 10,
                'role' => 'ACRUD',
                'created_at' => '2019-03-28 04:47:16',
                'updated_at' => '2019-03-28 07:37:31',
            ),
            8 => 
            array (
                'id' => 11,
                'id_user_group' => 1,
                'id_menu' => 11,
                'role' => 'AC',
                'created_at' => '2019-03-28 04:49:53',
                'updated_at' => '2019-03-28 04:49:54',
            ),
            9 => 
            array (
                'id' => 12,
                'id_user_group' => 1,
                'id_menu' => 9,
                'role' => 'ACRUD',
                'created_at' => '2019-03-29 02:21:50',
                'updated_at' => '2019-03-29 02:23:37',
            ),
            10 => 
            array (
                'id' => 13,
                'id_user_group' => 1,
                'id_menu' => 12,
                'role' => 'AC',
                'created_at' => '2019-04-11 09:10:50',
                'updated_at' => '2019-04-11 09:10:52',
            ),
            11 => 
            array (
                'id' => 15,
                'id_user_group' => 1,
                'id_menu' => 15,
                'role' => 'ACR',
                'created_at' => '2019-04-12 02:34:46',
                'updated_at' => '2019-04-15 04:27:18',
            ),
            12 => 
            array (
                'id' => 17,
                'id_user_group' => 1,
                'id_menu' => 14,
                'role' => 'ARC',
                'created_at' => '2019-04-15 04:25:42',
                'updated_at' => '2019-04-15 04:28:56',
            ),
            13 => 
            array (
                'id' => 18,
                'id_user_group' => 1,
                'id_menu' => 16,
                'role' => 'A',
                'created_at' => '2019-04-16 08:10:14',
                'updated_at' => '2019-04-16 08:10:14',
            ),
            14 => 
            array (
                'id' => 19,
                'id_user_group' => 1,
                'id_menu' => 17,
                'role' => 'A',
                'created_at' => '2019-04-16 08:12:53',
                'updated_at' => '2019-04-16 08:12:53',
            ),
            15 => 
            array (
                'id' => 20,
                'id_user_group' => 1,
                'id_menu' => 18,
                'role' => 'AC',
                'created_at' => '2019-04-16 08:12:54',
                'updated_at' => '2019-04-18 04:10:50',
            ),
            16 => 
            array (
                'id' => 23,
                'id_user_group' => 1,
                'id_menu' => 19,
                'role' => 'AC',
                'created_at' => '2019-04-22 07:58:13',
                'updated_at' => '2019-04-22 07:58:16',
            ),
            17 => 
            array (
                'id' => 24,
                'id_user_group' => 1,
                'id_menu' => 20,
                'role' => 'AC',
                'created_at' => '2019-04-22 09:19:34',
                'updated_at' => '2019-04-22 09:19:35',
            ),
            18 => 
            array (
                'id' => 25,
                'id_user_group' => 1,
                'id_menu' => 21,
                'role' => 'A',
                'created_at' => '2019-04-22 09:21:25',
                'updated_at' => '2019-04-22 09:21:25',
            ),
            19 => 
            array (
                'id' => 26,
                'id_user_group' => 1,
                'id_menu' => 22,
                'role' => 'CRU',
                'created_at' => '2019-08-26 04:44:40',
                'updated_at' => '2019-08-26 04:44:45',
            ),
            20 => 
            array (
                'id' => 29,
                'id_user_group' => 2,
                'id_menu' => 24,
                'role' => 'CRU',
                'created_at' => '2019-08-27 03:57:49',
                'updated_at' => '2019-08-27 03:57:54',
            ),
            21 => 
            array (
                'id' => 30,
                'id_user_group' => 2,
                'id_menu' => 4,
                'role' => 'CRU',
                'created_at' => '2019-08-27 04:01:15',
                'updated_at' => '2019-08-27 04:01:20',
            ),
            22 => 
            array (
                'id' => 31,
                'id_user_group' => 3,
                'id_menu' => 4,
                'role' => 'CRU',
                'created_at' => '2019-08-27 04:36:19',
                'updated_at' => '2019-08-27 04:36:23',
            ),
            23 => 
            array (
                'id' => 33,
                'id_user_group' => 3,
                'id_menu' => 25,
                'role' => 'CRU',
                'created_at' => '2019-08-27 04:43:24',
                'updated_at' => '2019-08-27 04:43:27',
            ),
            24 => 
            array (
                'id' => 34,
                'id_user_group' => 3,
                'id_menu' => 22,
                'role' => 'CRU',
                'created_at' => '2019-08-27 06:42:03',
                'updated_at' => '2019-08-27 06:42:07',
            ),
            25 => 
            array (
                'id' => 39,
                'id_user_group' => 4,
                'id_menu' => 22,
                'role' => 'AR',
                'created_at' => '2019-08-28 08:01:37',
                'updated_at' => '2019-08-28 08:01:39',
            ),
            26 => 
            array (
                'id' => 40,
                'id_user_group' => 1,
                'id_menu' => 26,
                'role' => 'ACRU',
                'created_at' => '2019-09-24 04:19:31',
                'updated_at' => '2019-09-24 04:19:34',
            ),
            27 => 
            array (
                'id' => 41,
                'id_user_group' => 1,
                'id_menu' => 27,
                'role' => 'ACR',
                'created_at' => '2019-09-25 07:42:23',
                'updated_at' => '2019-09-25 07:42:28',
            ),
        ));
        
        
    }
}
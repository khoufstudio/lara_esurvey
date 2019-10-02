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
                'created_at' => '2019-03-25 09:14:26',
                'updated_at' => '2019-03-25 10:23:31',
            ),
            1 => 
            array (
                'id' => 6,
                'id_user_group' => 1,
                'id_menu' => 6,
                'role' => 'ACR',
                'created_at' => '2019-03-25 10:33:14',
                'updated_at' => '2019-03-25 10:33:16',
            ),
            2 => 
            array (
                'id' => 8,
                'id_user_group' => 1,
                'id_menu' => 8,
                'role' => 'ACRUD',
                'created_at' => '2019-03-27 21:21:32',
                'updated_at' => '2019-03-27 21:21:42',
            ),
            3 => 
            array (
                'id' => 10,
                'id_user_group' => 1,
                'id_menu' => 10,
                'role' => 'ACRUD',
                'created_at' => '2019-03-27 21:47:16',
                'updated_at' => '2019-03-28 00:37:31',
            ),
            4 => 
            array (
                'id' => 11,
                'id_user_group' => 1,
                'id_menu' => 11,
                'role' => 'AC',
                'created_at' => '2019-03-27 21:49:53',
                'updated_at' => '2019-03-27 21:49:54',
            ),
            5 => 
            array (
                'id' => 17,
                'id_user_group' => 1,
                'id_menu' => 14,
                'role' => 'ARC',
                'created_at' => '2019-04-14 21:25:42',
                'updated_at' => '2019-04-14 21:28:56',
            ),
            6 => 
            array (
                'id' => 18,
                'id_user_group' => 1,
                'id_menu' => 16,
                'role' => 'A',
                'created_at' => '2019-04-16 01:10:14',
                'updated_at' => '2019-04-16 01:10:14',
            ),
            7 => 
            array (
                'id' => 23,
                'id_user_group' => 1,
                'id_menu' => 19,
                'role' => 'AC',
                'created_at' => '2019-04-22 00:58:13',
                'updated_at' => '2019-04-22 00:58:16',
            ),
            8 => 
            array (
                'id' => 24,
                'id_user_group' => 1,
                'id_menu' => 20,
                'role' => 'AC',
                'created_at' => '2019-04-22 02:19:34',
                'updated_at' => '2019-04-22 02:19:35',
            ),
            9 => 
            array (
                'id' => 25,
                'id_user_group' => 1,
                'id_menu' => 21,
                'role' => 'A',
                'created_at' => '2019-04-22 02:21:25',
                'updated_at' => '2019-04-22 02:21:25',
            ),
            10 => 
            array (
                'id' => 26,
                'id_user_group' => 1,
                'id_menu' => 22,
                'role' => 'CRU',
                'created_at' => '2019-08-25 21:44:40',
                'updated_at' => '2019-08-25 21:44:45',
            ),
            11 => 
            array (
                'id' => 29,
                'id_user_group' => 2,
                'id_menu' => 24,
                'role' => 'CRU',
                'created_at' => '2019-08-26 20:57:49',
                'updated_at' => '2019-08-26 20:57:54',
            ),
            12 => 
            array (
                'id' => 30,
                'id_user_group' => 2,
                'id_menu' => 4,
                'role' => 'CRU',
                'created_at' => '2019-08-26 21:01:15',
                'updated_at' => '2019-08-26 21:01:20',
            ),
            13 => 
            array (
                'id' => 31,
                'id_user_group' => 3,
                'id_menu' => 4,
                'role' => 'CRU',
                'created_at' => '2019-08-26 21:36:19',
                'updated_at' => '2019-08-26 21:36:23',
            ),
            14 => 
            array (
                'id' => 33,
                'id_user_group' => 3,
                'id_menu' => 25,
                'role' => 'CRU',
                'created_at' => '2019-08-26 21:43:24',
                'updated_at' => '2019-08-26 21:43:27',
            ),
            15 => 
            array (
                'id' => 34,
                'id_user_group' => 3,
                'id_menu' => 22,
                'role' => 'CRU',
                'created_at' => '2019-08-26 23:42:03',
                'updated_at' => '2019-08-26 23:42:07',
            ),
            16 => 
            array (
                'id' => 39,
                'id_user_group' => 4,
                'id_menu' => 22,
                'role' => 'AR',
                'created_at' => '2019-08-28 01:01:37',
                'updated_at' => '2019-08-28 01:01:39',
            ),
            17 => 
            array (
                'id' => 46,
                'id_user_group' => 1,
                'id_menu' => 1,
                'role' => 'ACR',
                'created_at' => '2019-03-25 10:28:31',
                'updated_at' => '2019-03-25 10:28:38',
            ),
            18 => 
            array (
                'id' => 47,
                'id_user_group' => 1,
                'id_menu' => 3,
                'role' => 'ACRUD',
                'created_at' => '2019-03-25 10:30:14',
                'updated_at' => '2019-03-25 10:30:18',
            ),
            19 => 
            array (
                'id' => 48,
                'id_user_group' => 1,
                'id_menu' => 4,
                'role' => 'ACR',
                'created_at' => '2019-03-25 10:31:27',
                'updated_at' => '2019-03-25 10:31:29',
            ),
            20 => 
            array (
                'id' => 51,
                'id_user_group' => 1,
                'id_menu' => 9,
                'role' => 'ACRUD',
                'created_at' => '2019-03-28 19:21:50',
                'updated_at' => '2019-03-28 19:23:37',
            ),
            21 => 
            array (
                'id' => 52,
                'id_user_group' => 1,
                'id_menu' => 15,
                'role' => 'ACR',
                'created_at' => '2019-04-11 19:34:46',
                'updated_at' => '2019-04-14 21:27:18',
            ),
            22 => 
            array (
                'id' => 55,
                'id_user_group' => 1,
                'id_menu' => 17,
                'role' => 'A',
                'created_at' => '2019-04-16 01:12:53',
                'updated_at' => '2019-04-16 01:12:53',
            ),
            23 => 
            array (
                'id' => 56,
                'id_user_group' => 1,
                'id_menu' => 18,
                'role' => 'AC',
                'created_at' => '2019-04-16 01:12:54',
                'updated_at' => '2019-04-17 21:10:50',
            ),
            24 => 
            array (
                'id' => 60,
                'id_user_group' => 1,
                'id_menu' => 23,
                'role' => 'CRU',
                'created_at' => '2019-05-15 19:40:07',
                'updated_at' => '2019-05-15 19:40:11',
            ),
            25 => 
            array (
                'id' => 61,
                'id_user_group' => 1,
                'id_menu' => 24,
                'role' => 'CRU',
                'created_at' => '2019-05-28 19:56:07',
                'updated_at' => '2019-05-28 19:56:11',
            ),
            26 => 
            array (
                'id' => 62,
                'id_user_group' => 1,
                'id_menu' => 25,
                'role' => 'CRU',
                'created_at' => '2019-05-29 00:06:41',
                'updated_at' => '2019-05-29 00:06:45',
            ),
            27 => 
            array (
                'id' => 63,
                'id_user_group' => 1,
                'id_menu' => 28,
                'role' => 'CRU',
                'created_at' => '2019-06-10 18:33:34',
                'updated_at' => '2019-06-10 18:33:38',
            ),
            28 => 
            array (
                'id' => 64,
                'id_user_group' => 1,
                'id_menu' => 26,
                'role' => 'CRU',
                'created_at' => '2019-07-25 23:12:53',
                'updated_at' => '2019-07-25 23:12:57',
            ),
            29 => 
            array (
                'id' => 65,
                'id_user_group' => 1,
                'id_menu' => 27,
                'role' => 'CRU',
                'created_at' => '2019-07-25 23:12:59',
                'updated_at' => '2019-07-25 23:13:03',
            ),
        ));
        
        
    }
}
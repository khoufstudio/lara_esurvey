<?php

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
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'username' => 'admin',
                'password' => '$2y$10$qe9QPx.lBbCuzhZSHFXa4eXHVeT23yR3LzSBem7VbKU7JNpcm8RkW',
                'hp' => '088876765654',
                'id_user_group' => 1,
                'is_admin' => 0,
                'status' => 0,
                'litbang_id' => 0,
                'peneliti_id' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-03-25 18:01:12',
                'updated_at' => '2019-04-23 03:48:42',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Pimpinan Litbang 1',
                'email' => 'pim1@pim.com',
                'username' => 'pim1',
                'password' => '$2y$10$ltQzH8RNBIle4zeprWoOh.nSiwfwL4bEuk3IS0sv5D1c73alPHdvu',
                'hp' => '+628575924391',
                'id_user_group' => 2,
                'is_admin' => 0,
                'status' => 1,
                'litbang_id' => 0,
                'peneliti_id' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-08-27 03:54:06',
                'updated_at' => '2019-08-27 03:54:06',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Peniliti Litbang 1',
                'email' => 'pen1@gmail.com',
                'username' => 'pen1',
                'password' => '$2y$10$IANpakPlPvmwEmXzEPUmwOuU9BjZYB3I80PFM5G8PQFDcN7pQifkS',
                'hp' => '+628575924391',
                'id_user_group' => 3,
                'is_admin' => 0,
                'status' => 1,
                'litbang_id' => 3,
                'peneliti_id' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-08-27 04:23:21',
                'updated_at' => '2019-08-27 04:23:21',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Responden Litbang 1',
                'email' => 'reslit1@mail.com',
                'username' => 'reslit1',
                'password' => '$2y$10$0X2Zpr9qY9cb1.18.QKQ6.WzPFowY4tbpax1nFipVogls4TUGE8Re',
                'hp' => '+628575924391',
                'id_user_group' => 4,
                'is_admin' => 0,
                'status' => 1,
                'litbang_id' => 0,
                'peneliti_id' => 4,
                'remember_token' => NULL,
                'created_at' => '2019-08-27 04:34:21',
                'updated_at' => '2019-08-27 04:34:21',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Peneliti Litbang 1 baru',
                'email' => 'pen2@gmail.com',
                'username' => 'pen2',
                'password' => '$2y$10$AJkp48IiMAFDekClPCKwx.qGBnqh7nTn2nWFuXuWs8wfqvgYv2JJy',
                'hp' => '+628575924391',
                'id_user_group' => 3,
                'is_admin' => 0,
                'status' => 1,
                'litbang_id' => 3,
                'peneliti_id' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-08-27 06:14:28',
                'updated_at' => '2019-08-27 06:14:28',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Peneliti Litbang 1 baru lagi',
                'email' => 'pen13@gmail.com',
                'username' => 'pen13',
                'password' => '$2y$10$cR82FEedXeJF6p2I/s8z0.h4mlUqzSfp/9HuM5cT8xk.RA12XMUqG',
                'hp' => '088876765654',
                'id_user_group' => 3,
                'is_admin' => 0,
                'status' => 1,
                'litbang_id' => 3,
                'peneliti_id' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-08-27 06:23:47',
                'updated_at' => '2019-08-27 06:23:47',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'responden pen1',
                'email' => 'pen1respon@gmail.com',
                'username' => 'pen1respon',
                'password' => '$2y$10$fOV.jlQ6mllHN2253RdHb.Fu94/kn/HBHh/EHEuZ8zW8ZLERbi0QG',
                'hp' => '+628575924391',
                'id_user_group' => 4,
                'is_admin' => 0,
                'status' => 1,
                'litbang_id' => 0,
                'peneliti_id' => 7,
                'remember_token' => NULL,
                'created_at' => '2019-08-27 06:27:08',
                'updated_at' => '2019-08-27 06:27:08',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Responden Litbang I baru',
                'email' => 'reslit1baru@gmail.com',
                'username' => 'reslit1baru',
                'password' => '$2y$10$LO5EOgU4EhpIuSEslBDgzu7.qzNTzilL3kCexeuorVEKbxXUwczEq',
                'hp' => '085759243791',
                'id_user_group' => 4,
                'is_admin' => 0,
                'status' => 1,
                'litbang_id' => 0,
                'peneliti_id' => 4,
                'remember_token' => NULL,
                'created_at' => '2019-08-27 20:23:27',
                'updated_at' => '2019-08-27 20:23:27',
            ),
        ));
        
        
    }
}
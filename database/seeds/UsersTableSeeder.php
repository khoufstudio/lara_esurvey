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
                'remember_token' => NULL,
                'created_at' => '2019-03-25 18:01:12',
                'updated_at' => '2019-04-23 03:48:42',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Peniliti 1',
                'email' => 'pen1@gmail.com',
                'username' => 'peniliti1',
                'password' => '$2y$10$Y4DM97AEGwX6Q2lgBJ/d4OSaGk8tVGLX72uXx2tuGlwxXOkvByGZG',
                'hp' => '+628575924391',
                'id_user_group' => 2,
                'is_admin' => 0,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-08-26 06:50:17',
                'updated_at' => '2019-08-26 06:50:17',
            ),
        ));
        
        
    }
}
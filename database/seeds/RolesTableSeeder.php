<?php

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
                'nama_user_group' => 'Super Admin',
                'created_at' => '2019-04-23 13:54:35',
                'updated_at' => '2019-04-23 13:54:36',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_user_group' => 'Pimpinan',
                'created_at' => '2019-08-26 02:08:48',
                'updated_at' => '2019-08-26 02:08:48',
            ),
            2 => 
            array (
                'id' => 3,
                'nama_user_group' => 'Peneliti',
                'created_at' => '2019-08-26 02:09:11',
                'updated_at' => '2019-08-26 02:09:11',
            ),
            3 => 
            array (
                'id' => 4,
                'nama_user_group' => 'Responden',
                'created_at' => '2019-08-26 02:09:28',
                'updated_at' => '2019-08-26 02:09:28',
            ),
        ));
        
        
    }
}
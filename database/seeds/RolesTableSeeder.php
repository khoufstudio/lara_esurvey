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
        ));
        
        
    }
}
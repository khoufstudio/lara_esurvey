<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\User;


class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::create([
            'name'  => 'Admin',
            'email' => 'admin@mail.com',
            'username'  => 'admin',
            'password'  => bcrypt('bismillah')
        ]);
        // $this->call("OthersTableSeeder");
    }


}

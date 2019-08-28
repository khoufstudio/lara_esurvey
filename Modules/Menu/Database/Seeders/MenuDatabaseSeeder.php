<?php

namespace Modules\Menu\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Menu\Entities\Menu;

class MenuDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $menus = Menu::all();/

        // foreach($menus as $menu){
            Menu::create([
                'nama_menu' => '$menu->nama_menu',
                'parrent'   => 1,
                'link'      => '$menu->link',
                'icon_menu' => '$menu->icon_menu'
            ]);
        // }

        // $this->call("OthersTableSeeder");
    }
}

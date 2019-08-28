<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $fillable = ['nama_menu', 'parrent', 'link', 'icon_menu', 'urutan'];



	public static function users(){
		return $this->belongsToMany('Modules\Users\Entities\User');
	}	


	public static function get_parrent(string $id_parrent){
		$menu = DB::table('menus')->where('id', $id_parrent)->first();
    
   if(isset($menu->id) && $menu->parrent == 0){
   		$ret = $menu->nama_menu;
   	}else{
   		$ret = 'root';
   	}
    return $ret;
	}


	public function get_parrent_all($id_menu){
		$menu_parrent = DB::table('menus')->where('parrent', $id_menu)->get();

		if($menu_parrent->count() > 0){
			return $menu_parrent;
		}else{
			return false;
		}
	}



}
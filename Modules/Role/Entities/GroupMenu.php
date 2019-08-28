<?php

namespace Modules\Role\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GroupMenu extends Model
{
    protected $fillable = [];

    // public function get_groupmenu($id_user_group){
    //     $group_menus = DB::table('group_menus')
    //             ->where('id_user_group', $id_user_group)
    //             ->get();
        
    //     return $group_menus;
    // }
}

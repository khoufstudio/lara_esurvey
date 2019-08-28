<?php

namespace Modules\Users\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use Notifiable;
	protected $guard = 'admin';
	protected $fillable = ['name', 'email', 'username', 'password', 'hp', 'id_user_group', 'status', 'litbang_id'];
	protected $hidden = [
		'password', 'remember_token',
	];


	public static function menus()
	{
		return $this->belongsToMany('Modules\Menu\Entities\Menu');
	}

	public function role()
	{
		return $this->hasOne('Modules\Role\Entities\Role');
	}

	public function group_menus()
	{
		return $this->belongsToMany('Modules\GroupMenu\Entities\GroupMenu');
	}


	public static function getUsers($id_role)
	{
		$users = DB::table('users')
			->leftJoin('roles', 'users.id_user_group', '=', 'roles.id')
			->select('users.*', 'roles.nama_user_group')
			->paginate(20);

		if ($id_role == 1) {
			$users = DB::table('users')
				->leftJoin('roles', 'users.id_user_group', '=', 'roles.id')
				->select('users.*', 'roles.nama_user_group')
				->paginate(20);
		} else {
			$users = DB::table('users')
				->leftJoin('roles', 'users.id_user_group', '=', 'roles.id')
				->select('users.*', 'roles.nama_user_group')
				->where('roles.id', '<>', '1')
				->paginate(20);
		}


		return $users;
	}

	public static function searchUser($keyword){
		$users = User::where('name', 'LIKE',  '  % '.$keyword.'%')
			->orWhere('username', 'LIKE',   '  %'.$keyword.'%')
			->paginate(20);

		return $users;
  }
  
  public function roles()
	{
		return $this->belongsTo('Modules\Role\Entities\Role', 'id_user_group');
	}
}

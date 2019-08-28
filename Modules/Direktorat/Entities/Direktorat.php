<?php

namespace Modules\Direktorat\Entities;

use Illuminate\Database\Eloquent\Model;

class Direktorat extends Model
{
    protected $fillable = ['nama_direktorat', 'status'];


    public static function searchDirektorat($keyword){
		$direktorats = Direktorat::where('nama_direktorat', 'LIKE', '%'.$keyword.'%')
                                ->paginate(20);
										// ->orWhere('username', 'LIKE', '%'.$keyword.'%')

		return $direktorats;
	}

}

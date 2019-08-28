<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{


    protected $fillable = ['pages_name', 'pages_name_eng', 'pages_desc', 'pages_desc_eng', 'create_author', 'publish', 'file_foto', 'category'];


    public static function searchPage($keyword){
		$users = Page::where('pages_name', 'LIKE', '%'.$keyword.'%')
						->paginate(20);

		return $users;
	}
}

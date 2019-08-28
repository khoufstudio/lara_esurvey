<?php

namespace Modules\BlogCategory\Entities;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = ['nama'];

    public static function get_category($id_blog){

        $kategori = BlogCategory::where('id', $id_blog)->first();
        return !empty($kategori->nama)?$kategori->nama:null;
    }


    public function blog(){
        return $this->belongsTo('Modules\Blog\Entities\Blog');
    }
}

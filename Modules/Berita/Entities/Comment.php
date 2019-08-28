<?php

namespace Modules\Berita\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['id_berita', 'comment'];

    public static function berita (){
        return $this->belongsTo('Berita');
    }
}

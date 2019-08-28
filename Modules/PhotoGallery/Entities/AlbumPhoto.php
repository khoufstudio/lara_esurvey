<?php

namespace Modules\PhotoGallery\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AlbumPhoto extends Model
{
    use Notifiable;
    protected $fillable = ['albumphoto_name', 'albumphoto_name_eng', 'albumphoto_desc', 'create_author', 'publish'];

    public function photogalleries(){
        return $this->hasMany('Modules\PhotoGallery\Entities\PhotoGallery', 'id_albumphoto');
    }


    public static function searchAlbumphoto($keyword){
        $photoalbum = AlbumPhoto::where('albumphoto_name', 'LIKE', '%'.$keyword.'%')
                                ->paginate(20);

        return $photoalbum;
    }
}

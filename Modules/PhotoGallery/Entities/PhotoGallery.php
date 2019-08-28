<?php

namespace Modules\PhotoGallery\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PhotoGallery extends Model
{
    use Notifiable;


    protected $fillable = [
        'id_albumphoto',
        'albumphoto_gallery_name',
        'albumphoto_gallery_name_eng',
        'albumphoto_gallery_desc',
        'albumphoto_gallery_desc_eng',
        'file_foto',
        'create_author',
        'sys_user_name',
        'publish',
        'type',
   
    ];

    public function albumphoto(){
        return $this->belongsTo('Modules\PhotoGallery\Entities\AlbumPhoto');
    }
}

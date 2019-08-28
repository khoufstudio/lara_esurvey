<?php

namespace Modules\VideoGallery\Entities;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    protected $fillable = ['video_name', 'video_name_eng', 'video_desc', 'video_desc_eng', 'file', 'create_author', 'publish', 'link', 'category'];
}

<?php

namespace Modules\FileUpload\Entities;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $fillable = ['id_kategori', 'file_name', 'file_desc', 'path', 'file_image', 'create_author'];

    public function file_categories(){
        return $this->hasMany('Modules\FileCategory\Entities\FileCategory', 'id', 'id_kategori');
    }
}

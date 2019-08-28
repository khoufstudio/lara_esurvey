<?php

namespace Modules\FileCategory\Entities;

use Illuminate\Database\Eloquent\Model;

class FileCategory extends Model
{
    protected $fillable = ['nama_kategori'];

    public function file_upload(){
        return $this->belongsTo('Modules\FileUpload\Entities\FileUpload');
    }
}

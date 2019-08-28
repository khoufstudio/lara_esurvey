<?php

namespace Modules\FileLibrary\Entities;

use Illuminate\Database\Eloquent\Model;

class FileLibrary extends Model
{
    protected $fillable = ['nama_file', 'path', 'id_user', 'publish'];
}

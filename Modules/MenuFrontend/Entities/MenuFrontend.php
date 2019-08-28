<?php

namespace Modules\MenuFrontend\Entities;

use Illuminate\Database\Eloquent\Model;

class MenuFrontend extends Model
{
    protected $fillable = ['nama_menu', 'nama_menu_eng', 'nama_parrent', 'parrent', 'link', 'kategori', 'urutan'];
}

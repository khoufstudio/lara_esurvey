<?php

namespace Modules\Responden\Entities;

use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    protected $fillable = ['user_id', 'nama', 'password', 'status'];

    public function peneliti()
    {
        return $this->belongsTo('App\User', 'user_id');    
    }
}

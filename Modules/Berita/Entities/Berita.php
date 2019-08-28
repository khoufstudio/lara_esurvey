<?php

namespace Modules\Berita\Entities;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Berita extends Model
{   

    use HasApiTokens, Notifiable;
    
    protected $fillable = ['title', 'description', 'image'];

    public function comments(){
      return $this->hasMany('Modules\Berita\Entities\Comment', 'id_berita');
    }
    
}

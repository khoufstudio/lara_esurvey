<?php

namespace Modules\LoginPublic\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginPublic extends Authenticatable
{
    use Notifiable;

    protected $guard = 'public';
    protected $table = "public_users";
    protected $fillable = [
        'name', 'email','username', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
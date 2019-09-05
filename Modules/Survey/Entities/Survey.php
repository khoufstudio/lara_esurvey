<?php

namespace Modules\Survey\Entities;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'status'];

    public function question()
    {
    	 return $this->hasMany('Modules\Survey\Entities\SurveyQuestion');
    }
}

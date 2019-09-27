<?php

namespace Modules\Survey\Entities;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
    	'nama', 
    	'deskripsi', 
    	'status',
    	'date_from',
    	'date_to'
    ];

    public function question()
    {
    	 return $this->hasMany('Modules\Survey\Entities\SurveyQuestion');
    }
}

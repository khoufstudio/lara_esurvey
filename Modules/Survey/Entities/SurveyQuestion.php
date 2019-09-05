<?php

namespace Modules\Survey\Entities;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
  protected $fillable = ['survey_id',	'tipe_pertanyaan', 'pertanyaan'];	
}

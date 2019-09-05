<?php

namespace Modules\Survey\Entities;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
   protected $fillable = ['question_id', 'urutan',	'jawaban',	'bobot'];

   public function question()
   {
   	return $this->belongsTo('Modules\Survey\Entities\SurveyQuestion', 'question_id');		
   }
}

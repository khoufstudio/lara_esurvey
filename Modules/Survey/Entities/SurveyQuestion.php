<?php

namespace Modules\Survey\Entities;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyQuestion extends Model
{
	// use SoftDeletes;
	
  protected $fillable = ['survey_id',	'urutan', 'tipe_pertanyaan', 'pertanyaan', 'tipe_text'];	

   /**
   * Override parent boot and Call deleting event
   *
   * @return void
   */
    // protected static function boot() 
    // {
    //   parent::boot();

    //   static::deleting(function($sq) {
    //      foreach ($sq->answer()->get() as $ans) {
    //         $ans->delete();
    //      }
    //   });
    // }

  public function answer()
  {
  	return $this->hasMany('Modules\Survey\Entities\SurveyAnswer', 'question_id');
  }
}

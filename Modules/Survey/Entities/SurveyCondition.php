<?php

namespace Modules\Survey\Entities;

use Illuminate\Database\Eloquent\Model;

class SurveyCondition extends Model
{
    protected $fillable = ['survey_answer_id', 'answer', 'condition', 'jump'];
}

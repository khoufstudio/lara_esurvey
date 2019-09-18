<?php

namespace Modules\Survey\Entities;

use Illuminate\Database\Eloquent\Model;

class SurveyCondition extends Model
{
    protected $fillable = ['question_id', 'answer', 'condition', 'jump'];
}

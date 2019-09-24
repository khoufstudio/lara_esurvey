<?php

namespace Modules\Survey\Entities;

use Illuminate\Database\Eloquent\Model;

class SurveyResult extends Model
{
    protected $fillable = ['survey_id', 'jawaban'];

    public function survey_link()
    {
      return $this->BelongsTo('\Modules\Survey\Entities\Survey', 'survey_id');
    }
}

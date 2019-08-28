<?php

namespace Modules\RunningText\Entities;

use Illuminate\Database\Eloquent\Model;

class RunningText extends Model
{
    protected $fillable = ['title', 'link', 'desc', 'publish'];

    public static function searchRunningText($keyword){

        $runningtext = RunningText::where('title', 'LIKE', '%'.$keyword.'%')
                                    ->paginate(20);

        return $runningtext;
        
    }
}

<?php

namespace Modules\Slider\Entities;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [];


    public static function searchSlider($keyword){
        $sliders = Slider::where('slider_name', 'LIKE', '%'.$keyword.'%')
                   ->paginate(20);

        return $sliders;
    }
}

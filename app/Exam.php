<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Exam extends Model
{
    public $timestamps = false;

    public function activities()
    {
        return $this->belongsTo('App\Activities','code_act');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject','code_subject');
    }

    public function student()
    {
        return $this->hasMany('App\Student');
    }
}

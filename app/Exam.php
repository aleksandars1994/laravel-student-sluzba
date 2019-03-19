<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $timestamps = false;

    public function activities()
    {
        return $this->hasMany('App\Activities');
    }

    public function subject()
    {
        return $this->hasMany('App\Subject');
    }

    public function student()
    {
        return $this->hasMany('App\Student');
    }
}

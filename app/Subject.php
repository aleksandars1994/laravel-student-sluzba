<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
     public function exam()
    {
        return $this->hasMany('App\Exam');
    }

     public function user()
    {
        return $this->belongsTo('App\User');
    }

    public $timestamps = false;
}

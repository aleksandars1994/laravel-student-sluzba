<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
     public function exam()
    {
        return $this->belongsTo('App\Subject');
    }

     public function user()
    {
        return $this->belongsTo('App\User');
    }

    public $timestamps = false;
}

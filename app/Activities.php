<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
     public function exam()
    {
        return $this->belongsTo('App\Subject');
    }
}

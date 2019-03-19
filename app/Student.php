<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function exam()
    {
        return $this->belongsTo('App\Subject');
    }

    public function t_fee()
    {
        return $this->belongsTo('App\TFee');
    }

}

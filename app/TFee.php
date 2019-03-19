<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TFee extends Model
{
   public function student()
    {
        return $this->hasOne('App\Student');
    }

    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    //protected $fillable=['name'];

    protected $guarded=[];

    protected $primaryKey = 'student_id'; // or null

    public $incrementing = false;

    public $fillable=['email'];


    public function user()
    {
        return $this->belongsTo('App\User');
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

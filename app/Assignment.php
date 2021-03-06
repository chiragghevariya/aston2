<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function questions()
    {
        return $this->hasMany('App\Question');
    }


    public static function Name($id)
    {
        return Assignment::find($id)->title;
    }

    public function Submits()
    {
        return $this->hasMany('App\Submit')->where('status','!=','unsubmitted');
    }

    public function scopeAuth($query)
    {
        return $query->where('user_id',\Auth::user()->id);
    }

    public function myAnswers()
    {
        return Answer::where('assignment_id',$this->id)->get();
    }
    

}

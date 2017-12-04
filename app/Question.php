<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];
    public function questionable()
    {
        return $this->morphTo();
    }

    public function answers(){
        return $this->hasMany('App\Answer');
    }

    public function authorName($authorRole)
    {
        if($authorRole == "Doctor")
        {
            return Doctor::where('id', $this->author_id)->first()->name;
        }else{
            return Patient::where('id', $this->author_id)->first()->name;
        }

    }

    public function recipientName($recipientRole)
    {
        if($recipientRole == "Patient")
        {
            return Doctor::where('id', $this->questionable_id)->first()->name;
        }else{
            return Patient::where('id', $this->questionable_id)->first()->name;
        }
    }
}

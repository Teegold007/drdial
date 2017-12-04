<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setNameAttribute($value){
        return $this->attributes['name'] = strtolower($value);
    }

    public function getGuardNameAttribute($value){
        return ucfirst($value);
    }

}

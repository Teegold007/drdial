<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Doctor extends Authenticatable implements JWTSubject
{
    use HasRoles, Notifiable;

    protected $hidden = ['password','remember_token','pivot','roles.id,created_at,updated_at,pivot'];
    protected $guard_name = 'doctor';
    protected $guarded = [];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getFieldAttribute($field)
    {
        return ucfirst($field);
    }

    public function patients()
    {
        return $this->belongsToMany('App\Patient','doctor_patient');
    }

    public function questions()
    {
        return $this->morphMany('App\Question','questionable');
    }

    public function myQuestions()
    {
        // return $this->hasMany('App\Question','author_id');
        return Question::where('author_id',$this->id)->where('author_role','Doctor')->get();
    }
    public function blacklist()
    {
        return $this->hasMany('App\Blacklist');
    }
}

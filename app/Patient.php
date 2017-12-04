<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Patient extends Authenticatable implements JWTSubject
{
    use HasRoles,Notifiable;

    protected $hidden = ['password','remember_token','pivot'];
    protected $guard_name = 'patient';
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

    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }

    public function questions()
    {
        return $this->morphMany('App\Question','questionable');
    }

    public function myQuestions()
    {
        return Question::where('author_id',$this->id)->where('author_role','Patient')->get();
    }
    public function blacklist()
    {
        return $this->hasMany('App\Blacklist');
    }
}

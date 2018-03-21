<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email', 
        'password',
        'username',
        'jop_id',
        'img',
        'address',
        'phone',
        'store_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function store(){
        return $this->belongsTo('App\Store');
    }
    public function adds(){
        return $this->hasMany('App\Add');
    }
    public function returnes(){
        return $this->hasMany('App\Returne');
    }
    public function covenants(){
        return $this->hasMany('App\Covenant');
    }
    public function notifys(){
        return $this->hasMany('App\Notify');
    }
}

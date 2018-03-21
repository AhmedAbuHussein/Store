<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name',];

    public function users(){
        return $this->hasMany('App\User');
    }

    public function datastores(){
        return $this->hasMany('App\Datastore');
    }
    public function notifys(){
        return $this->hasMany('App\Notify');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'ssn',
        'establishment',
    ];

    public function returnes(){
        return $this->hasMany('App\Returne');
    }
    public function covenants(){
        return $this->hasMany('App\Covenant');
    }
}

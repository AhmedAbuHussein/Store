<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datastore extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'price_one',
        'total',
        'source',
        'available',
        'store_id'
    ];
    public $timestamps = false;

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
}

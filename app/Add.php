<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    protected $fillable = [
        'source',
        'quantity',
        'permision',
        'status',
    ];

    public function datastore(){
        return $this->belongsTo('App\Datastore');
    }

    public function user(){
        return $this->belongsTo('App\Datastore');
    }

}

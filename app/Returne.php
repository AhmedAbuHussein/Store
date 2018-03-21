<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returne extends Model
{
    protected $fillable = [
        'quantity',
        'employee_id',
        'user_id',
        'datastore_id',
    ];

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    public function datastore(){
        return $this->belongsTo('App\Datastore');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $fillable = [
        'notify',
        'readed',
        'user_id',
        'requerd_num',
        'store_id',
        'person',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function store(){
        return $this->belongsTo('App\Store');
    }
}

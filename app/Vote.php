<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    protected $table="votes";
    protected $fillable = [
        'user', 
        'product',
         'star'
    ];
    public function users(){
        return $this->belongsTo('App\User','user','id');
    }
    public function products(){
        return $this->belongsTo('App\Product','product','id');
    }

}

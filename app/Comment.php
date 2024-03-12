<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table="comments";

    public function users(){
        return $this->belongsTo('App\User','user','id');
    }
    public function products(){
        return $this->belongsTo('App\Product','product','id');
    }
   
}

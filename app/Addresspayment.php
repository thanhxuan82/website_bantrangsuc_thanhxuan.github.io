<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addresspayment extends Model
{
    //
    protected $table="addresspayments";

    public function users(){
        return $this->belongsTo('App\User','user','id');
    }
}

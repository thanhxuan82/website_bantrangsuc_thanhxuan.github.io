<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table="bills";
    public function detailbills(){
        return $this->hasMany('App\Detailbill', 'bill','id');
    }
    public function users(){
        return $this->belongsTo('App\User', 'user','id');
    }
    public function address_user(){
        return $this->belongsTo('App\Addresspayment', 'address','id');
    }
}

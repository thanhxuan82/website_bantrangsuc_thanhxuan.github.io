<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailbill extends Model
{
    //
    protected $table="detailbills";

    public function users(){
        return $this->belongsTo('App\Bill','bill','id');
    }
    public function products(){
        return $this->belongsTo('App\Product', 'product','id');
    }

}

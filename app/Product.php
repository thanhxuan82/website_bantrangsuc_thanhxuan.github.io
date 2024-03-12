<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //\
    protected $table="products";
    protected $fillable = [
        'name',
        'category',
         'description',
         'image1',
         'image2',
         'image3',
         'image4',
         'quantity',
         'price',
    ];
    public function votes(){
        return $this->hasMany('App\Vote','product','id');
    }
    public function user_vote(){
        return $this->belongsToMany('App\User','App\Vote','product','user');
    }
    public function user_comment(){
        return $this->belongsToMany('App\User','App\Comment','product','user');
    }
    public function comment(){
        return $this->hasMany('App\Comment','product','id');
    }

}

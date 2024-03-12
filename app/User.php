<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function votes()
    {
        return $this->hasMany('App\Vote','user','id');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment','user','id');
    }
    public function product_vote(){
        return $this->belongsToMany('App\Product','App\Vote','user','product','id');
    }
    public function product_comment(){
        return $this->belongsToMany('App\Product','App\Comment','user','product','id');
    }
    public function address_p(){
        return $this->hasOne('App\Addresspayment', 'user','id');
    }
    public function bill(){
        return $this->belongsTo('App\Bill', 'user','id');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addresspayment;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    //
    public function store(Request $r){
        $phone=$r->phone;
        $user=Auth::user()->id;
        $city=$r->city;
        $district=$r->district;
        $address=$r->address;
        $newAddress=new Addresspayment;
        $check_address=Addresspayment::where('user',$user)->first();
        if($check_address){
            $newAddress=Addresspayment::find($check_address->id);
            $newAddress->city=$city;
            $newAddress->phone=$phone;
            $newAddress->district=$district;
            $newAddress->address=$address;
        }else{
            $newAddress->user=$user;
            $newAddress->city=$city;
            $newAddress->phone=$phone;
            $newAddress->district=$district;
            $newAddress->address=$address;
        }
        if($newAddress->save()){
            return Redirect('/payment');
        }

    }
    public function infotAddress(){
        
        $info=Addresspayment::where('user',Auth::user()->id)->first();
        if($info){
            return view('user.address')->with('info',$info);
        }else{
            return view('user.address');
        }
        
       
    }
}

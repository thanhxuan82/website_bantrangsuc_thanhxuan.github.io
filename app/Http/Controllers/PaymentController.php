<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Bill;
use App\Detailbill;
use App\User;
use App\Addresspayment;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //
    public function payment(Request $r)
    {
        $cart=$r->session()->get('Cart');
        if(isset($cart)){
            return view('user.payment');
        }else{
            return Redirect('/list-cart');
        }
        
    }
    public function success(Request $r)
    {
        $cart=$r->session()->get('Cart');
        if(isset($cart)){
            //get address by user
            $address_user= User::find(Auth::user()->id)->address_p->id;
            //insert bill
            $time=Carbon::now('Asia/Ho_Chi_Minh');
            $array_time =explode(" ",$time) ;
            $date=$array_time[0];
            $time=$array_time[1];
            $bill=new Bill;
            $bill->user=Auth::user()->id;
            $bill->address=$address_user;
            $bill->totalquantity=$cart->totalQuantity;
            $bill->totalprice=$cart->totalPrice;
            $bill->date=$date;
            $bill->time=$time;
            $bill->status=0;
            if($bill->save()){
                //insert bill detail
                $bill_max=Bill::max('id');
                //get id product
                $id_product=array();
                foreach($cart->products as $id){
                     array_push($id_product,$id['productInfo']->id);
                }
                //insert details bill
                foreach($id_product as $id){
                    $billdetails=new Detailbill;
                    $billdetails->product=$id;
                    $billdetails->bill=$bill_max;
                    $billdetails->quantity=$cart->products[$id]['quantity'];
                    $billdetails->total=$cart->products[$id]['price'];
                    $billdetails->save();
                    // if($billdetails->save()){
                    //     foreach($id_product as $id){
                    //         $update_product=Product::find($id);
                    //         $update_product->quantity=$update_product->quantity-$cart->products[$id]['quantity'];
                    //         $update_product->save();
                    //     }
                    // }
                   
                }
                
            }

        }
        $r->session()->forget('Cart');
        return view('user.success');
        
    }

    
}

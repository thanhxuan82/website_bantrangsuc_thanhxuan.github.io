<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;
use Illuminate\Support\Facades\Cookie;
class CartController extends Controller
{
    public function AddCart(Request $r){
        $id=$r->id_product;
        $quantity=$r->quantity;
        $product=Product::where('id',$id)->first();
        if($product != null){
            $oldCart=Session('Cart') ? Session('Cart') : null;
            $newCart=new Cart($oldCart);
            $newCart->AddCart($product,$id,$quantity);
            $r->session()->put('Cart',$newCart);
            
           
        }
        return view('user.cart')->with('newCart',$newCart);
    }
    public function DeleteItemCart(Request $r){
        $oldCart=Session('Cart') ? Session('Cart') : null;
        $newCart=new Cart($oldCart);
        $newCart->DeleteItemCart($r->id);
       
        if(Count($newCart->products)>0){
            $r->session()->put('Cart',$newCart);
        }else{
            $r->session()->forget('Cart');
        }
        return view('user.cart')->with('newCart',$newCart); 
    }
    public function DeleteItemListCart(Request $r){
        $oldCart=Session('Cart') ? Session('Cart') : null;
        $newCart=new Cart($oldCart);
        $newCart->DeleteItemCart($r->id);
       
        if(Count($newCart->products)>0){
            $r->session()->put('Cart',$newCart);
        }else{
            $r->session()->forget('Cart');
        }
        return view('user.listdelCart')->with('newCart',$newCart); 
    }
    public function DeleteItemCartAjax(Request $r){
        $oldCart=Session('Cart') ? Session('Cart') : null;
        $newCart=new Cart($oldCart);
        $newCart->DeleteItemCart($r->id);
       
        if(Count($newCart->products)>0){
            $r->session()->put('Cart',$newCart);
        }else{
            $r->session()->forget('Cart');
        }
        return view('user.cart')->with('newCart',$newCart); 
    }
    public function UpdateItemCart(Request $r){
        $oldCart=Session('Cart') ? Session('Cart') : null;
        $newCart=new Cart($oldCart);
        $newCart->UpdateItemCart($r->id,$r->quantity);
        if(Count($newCart->products)>0){
            $r->session()->put('Cart',$newCart);
        }else{
            $r->session()->forget('Cart');
        }
        return view('user.cart')->with('newCart',$newCart);
    }
    public function listCart(){
        return view('user.listCart');
    }
}

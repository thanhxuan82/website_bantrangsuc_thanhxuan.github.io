<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public $products=null;
    public $totalPrice=0;
    public $totalQuantity=0;
    public function __construct($cart){
        if($cart){
            $this->products=$cart->products;
            $this->totalPrice=$cart->totalPrice;
            $this->totalQuantity=$cart->totalQuantity;
        }
    }
    public function AddCart($product,$id){
        $newProduct=['quantity'=>0,
                     'productInfo'=>$product,
                     'price'=>$product->price
                    ];
        if($this->products){
            if(array_key_exists($id,$this->products)){ // nếu tồn tại $id trong $products
                $newProduct=$this->products[$id];
            }
        }
        $newProduct['quantity']++;
        $newProduct['price']=$newProduct['quantity']*$product->price;
        $this->products[$id]=$newProduct;
        $this->totalPrice +=$product->price;
        $this->totalQuantity++;
    }
    public function DeleteItemCart($id){
        $this->totalQuantity-=$this->products[$id]['quantity'];
        $this->totalPrice-=$this->products[$id]['price'];
       unset($this->products[$id]); // xoa 1 doi tuong co key la id trong mang
    }
    public function UpdateItemCart($id,$quantity){
        //trừ đi số tượng của item hiện tại
        $this->totalQuantity-=$this->products[$id]['quantity'];
        $this->totalPrice-=$this->products[$id]['price'];
        // gán số lượng mới
        $this->products[$id]['quantity']=$quantity;
        $this->products[$id]['price']=$this->products[$id]['productInfo']->price*$quantity;
        //cập nhật lại
        $this->totalQuantity+=$this->products[$id]['quantity'];
        $this->totalPrice+=$this->products[$id]['price'];
    }
}

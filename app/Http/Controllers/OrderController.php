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

class OrderController extends Controller
{
    //
    public function list(){
        $user=Auth::user()->id;
        $bills = Bill::where('user', $user)->paginate(5);
        return view('user.order')->with('bills',$bills);
    }

    public function listBill(){
        $i=0;
        $bills=Bill::orderBy('id', 'DESC')->get();
        return view('admin.list_bill')->with('bills',$bills)->with('i',$i);
    }

    public function status1($id){
        $bills = Bill::find($id);
        $bills->status = 1;
        $bills->save();
        return redirect('admin/bill/list-all')->with('thongbao','Thao tác thành công');
    }
    public function status0($id){
        $bills = Bill::find($id);
        $bills->status = 0;
        $bills->save();
        return redirect('admin/bill/list-all')->with('thongbao','Thao tác thành công');
    }
    public function status2($id){
        $bills = Bill::find($id);
        $bills->status = 2;
        $detailbill = Detailbill::where('bill',$id)->get();

        foreach($detailbill as $de){

            $product = Product::find($de->product);
            $product->quantity = $product->quantity - $de->quantity;
            $product->save();

        }
        $bills->save();
        return redirect('admin/bill/list-all')->with('thongbao','Thao tác thành công');
    }

    public function deletebills($id)
    {
        $bills = Bill::find($id);
        $bills->delete();
        return redirect('admin/bill/list-all')->with('thongbao', 'Delete thành công');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Vote;
use App\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    ////---------------------------user------------------------------------------
    public function store(Request $r){
        $file1=$r->file('image1');
        $file2=$r->file('image2');
        $file3=$r->file('image3');
        $file4=$r->file('image4');
        $goc1=$file1->getClientOriginalExtension();
        $goc2=$file2->getClientOriginalExtension();
        $goc3=$file3->getClientOriginalExtension();
        $goc4=$file4->getClientOriginalExtension();
        if(
         $goc1=='jpg' || $goc1=='jpeg' || $goc1=='png' &&
         $goc2=='jpg' || $goc2=='jpeg' || $goc2=='png' &&
         $goc3=='jpg' || $goc3=='jpeg' || $goc3=='png' &&
         $goc4=='jpg' || $goc4=='jpeg' || $goc4=='png'){
            $image1="product"."-".Str::random(3).rand(0,999).".".$goc1;
            $image2="product"."-".Str::random(3).rand(0,999).".".$goc2;
            $image3="product"."-".Str::random(3).rand(0,999).".".$goc3;
            $image4="product"."-".Str::random(3).rand(0,999).".".$goc4;
            $product=new Product;
            $product->name=$r->name;
            $product->category=$r->category;
            $product->description=$r->description;
            $product->image1=$image1;
            $product->image2=$image2;
            $product->image3=$image3;
            $product->image4=$image4;
            $product->quantity=$r->quantity;
            $product->price=$r->price;
            $product->save();
            $file1->move('public\uploads\products',$image1);
            $file2->move('public\uploads\products',$image2);
            $file3->move('public\uploads\products',$image3);
            $file4->move('public\uploads\products',$image4);
            $notice="<h3 class='text-success'> Add Success ! </h3>";
             return redirect()->route('list-product')->with('notice',$notice);
           
        }else{
            $notice="<h2 class='text-error'> The file must contain jpg, jpeg, png </h2>";
            return redirect()->route('list-product')->with('notice',$notice);
        }
      
         
     }
      
    
    public function shop(){
        $products=Product::get();
        $i=0;
        return view('user.shop')->with('products',$products);
    }
    public function details($id){
        //get details
        $detail=Product::find($id);
        //get star
        if(Auth::check()){
            $user=Auth::user()->id;
            if(Vote::where('user',$user)->where('product',$id)->first()){
                
                $star=Vote::where('user',$user)->where('product',$id)->first()->star;

            }else{
                $vote=new Vote;
                $vote->user=$user;
                $vote->product=$id;
                $vote->star=0;
                $vote->save();
                $star=0;
            }
           
        }else{
            $star=0;
        }
        $relates=Product::where('category',$detail->category)->get();
        $comments=Comment::orderBy('id', 'DESC')->where('product',$id)->get();
        $count=Comment::orderBy('id', 'DESC')->where('product',$id)->count();
        return view('user.details')->with('detail',$detail)
        ->with('star',$star)->with('id',$id)
        ->with('comments',$comments)
        ->with('count',$count)
        ->with('relates',$relates);
    }
    public function topStar(){
        $top4=Vote::groupBy('product')
            ->selectRaw('sum(star) as sumStar, product')
            ->orderByDesc('sumStar')
            ->take(2)
            ->get();
            return view('user.top')->with('top4',$top4);
    }
  



//----------------------------------------------admin------------------------------
    public function getall(){
        $products=Product::paginate(4);
        $i=0;
        return view('admin.list_product')->with('products',$products)->with('i',$i);
    }
    

    public function update($id)
   {


       $Product = Product::find($id);
       return view('admin.update_product',['Product'=>$Product]);
   }

   public function postupdate(Request $request,$id)
    {
        $Product = Product::find($id);
        $this->validate($request,
            ['name' => 'required|min:2',

            // 'categoty' => 'required',
            'quantity' => 'required|min:2',
            'price' => 'required|min:2',
            'description' => 'required|min:2'
            ],[
            'name.required' => 'Bạn chưa nhập tên course','name.min' => 'Tên phải có độ dài lớn hơn 1 kí tự'
            // ,'category.required' => 'Bạn chưa chọn category'
            ,'quantity.required' => 'Bạn chưa nhập quantity'
            ,'quantity.min' => 'Tên phải có độ dài lớn hơn 1 kí tự'
            ,'price.required' => 'Bạn chưa nhập price'
            ,'price.min' => 'Tên phải có độ dài lớn hơn 1 kí tự'
            ,'description.required' => 'Bạn chưa nhập description'
            ,'description.min' => 'Tên phải có độ dài lớn hơn 1 kí tự'
            ]);
            $Product->name = $request->name;
            $Product->category = $request->category;
            $Product->description = $request->description;
            $Product->quantity = $request->quantity;
            $Product->price = $request->price;


            if ($request->hasFile('image1'))
            {
                $file = $request->file('image1');
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
                {
                    return redirect('admin/update-product/'.$id)->with('thongbao', 'file hình sai định dạng');
                }
                $name = $file->getClientOriginalName();
                $image1 = Str::random(4) ."_". $name;
                while (file_exists("public/uploads/products/".$image1))
                {
                    $image1 = Str::random(4) ."_". $name;
                }
                $file->move("public/uploads/products/",$image1);
                unlink("public/uploads/products/".$Product->image1);
                $Product->image1 = $image1;
            }

            if ($request->hasFile('image2'))
            {
                $file = $request->file('image2');
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
                {
                    return redirect('admin/update-product/'.$id)->with('thongbao', 'file hình sai định dạng');
                }
                $name = $file->getClientOriginalName();
                $image2 = Str::random(4) ."_". $name;
                while (file_exists("public/uploads/products/".$image2))
                {
                    $image2 = Str::random(4) ."_". $name;
                }
                $file->move("public/uploads/products/",$image2);
                unlink("public/uploads/products/".$Product->image2);
                $Product->image2 = $image2;
            }

            if ($request->hasFile('image3'))
            {
                $file = $request->file('image3');
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
                {
                    return redirect('admin/update-product/'.$id)->with('thongbao', 'file hình sai định dạng');
                }
                $name = $file->getClientOriginalName();
                $image3 = Str::random(4) ."_". $name;
                while (file_exists("public/uploads/products/".$image3))
                {
                    $image3 = Str::random(4) ."_". $name;
                }
                $file->move("public/uploads/products/",$image3);
                unlink("public/uploads/products/".$Product->image3);
                $Product->image3 = $image3;
            }

            if ($request->hasFile('image4'))
            {
                $file = $request->file('image4');
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
                {
                    return redirect('admin/update-product/'.$id)->with('thongbao', 'file hình sai định dạng');
                }
                $name = $file->getClientOriginalName();
                $image4 = Str::random(4) ."_". $name;
                while (file_exists("public/uploads/products/".$image4))
                {
                    $image4 = Str::random(4) ."_". $name;
                }
                $file->move("public/uploads/products/",$image4);
                unlink("public/uploads/products/".$Product->image4);
                $Product->image4 = $image4;
            }




        $Product->save();
        return redirect('admin/update-product/'.$id)->with('thongbao', 'Update thành công');
    }



    public function delete($id)
    {
        $Product = Product::find($id);
        $Product->delete();
        return redirect('admin/list-product')->with('thongbao', 'Delete thành công');
    }
    public function searchProduct(Request $r){
        $products=Product::where('name', 'like', '%'.$r->key.'%')->get();
        $i=0;
      
        foreach($products as $product){
            echo' <tr>
                    
            <td>'.$i++.'</td>
            <td>'. substr($product->name, 0, 15)."..." .'</td>
            <td>'.$product->category.'</td>
            <td><img style="height: 60px; width: 100px" src="../public/uploads/products/'.$product->image1.'" alt=""></td>
            <td><img style="height: 60px; width: 100px"  src="../public/uploads/products/'.$product->image2.'" alt=""></td>
            <td><img style="height: 60px; width: 100px"  src="../public/uploads/products/'.$product->image3.'" alt=""></td>
            <td><img style="height: 60px; width: 100px"  src="../public/uploads/products/'.$product->image4.'" alt=""></td>
            <td>'.$product->price.'.$</td>
            <td>'.$product->quantity.'</td>
            <td><a href="update-product/'. $product->id .'"><i class="fas fa-edit"></i></a> | <a href="delete-product/'. $product->id .'" onclick="confirm("do you want to delete ?")"><i class="fas fa-trash-alt"></i></a></td>
        
        </tr>';
        }
       
    }
    public function deletecomment($id)
    {
        $comment = comment::find($id);
        $comment->delete();
        return back()->with('thongbao', 'Delete comment thành công');
    }
}
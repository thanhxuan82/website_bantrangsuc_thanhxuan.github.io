<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    ///admin

    public function listall()
    {
        $User = User::all();
        return view('admin.list_user',['User' => $User]);
    }

    public function create()
    {

        return view('admin.create_user');
    }

    public function postcreate(Request $request)
    {

        $this->validate($request,
        ['name' => 'required|min:2|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:2|max:100',
        'againpassword' => 'required|same:password',

        ],
        ['name.required' => 'Bạn chưa nhập tên account','name.min' => 'Tên phải có độ dài lớn hơn 1 kí tự','name.max' => 'Tên phải có độ dài nhỏ hơn 100 kí tự',
        'email.required' => 'Bạn chưa nhập email','email.email' => 'Bạn chưa nhập đúng định dạng email','email.unique' => 'email đã tồn tại',
        'password.required' => 'Bạn chưa nhập password','pass.min' => 'password phải có độ dài lớn hơn 1 kí tự','password.max' => 'password phải có độ dài nhỏ hơn 100 kí tự',
        'againpassword.required' => 'Bạn chưa nhập lại password','againpassword.same' => 'password nhập lại chưa khớp',

        ]
                        );
        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt($request->password);
        $User->role = 2;
        $User->save();
        return redirect('admin/account/create')->with('thongbao', 'Thêm thành công');
    }


    public function update($id)
    {
        $User = User::find($id);
        return view('admin.update_user',['User'=>$User]);

    }
   


    public function delete($id)
    {
        $User = User::find($id);
        $User->delete();
        return redirect('admin/account/list-all')->with('thongbao', 'Delete thành công');
    }

    //user
    public function store(Request $r){
        

       $user=new User;
       if($check_mail=User::where('email',$r->email)->first()){
            echo "check-mail";
       }else{
        $user->name=$r->name;
        $user->email=$r->email;
        $user->password=bcrypt($r->password);
        $user->role=2;
        //echo ($r->password);
        $user->save();
        echo "success";
       }
        
    }
    public function post_login(Request $r){
        if(Auth::attempt(['email' => $r->email, 'password' => $r->password])){
            if(Auth::user()->role==1){
                return redirect('/admin');
            }else{
                return redirect('/');
            }
            
        }else{
            return view('user.login')->with('error','check account, plaease!');
        }
    }
    public function profile(){
        $id=Auth::user()->id;
        $user=User::where('id',$id)->first();
        return view('user.profile',compact('user'));
    }
    public function update_profile(Request $r){
        $name=$r->name;
        $file=$r->file('image');
        $id=Auth::user()->id;
        $user=User::find($id);
        echo ($user);
       if($file==null){
            $user->name=$name;
            $user->save();
        }else{
            $goc=$file->getClientOriginalExtension();
            if($goc=='jpg' || $goc=='jpeg' || $goc=='png'){
                $image=$id.".".$goc;
                $user->name=$name;
                
                    if(Auth::user()->image==""){
                        $file->move('public\frontend\uploads\profile',$image);
                    }else{
                        $path=public_path().'/frontend/uploads/profile/'.Auth::user()->image;
                        unlink($path);
                        $file->move('public\frontend\uploads\profile',$image);
                     }
                $user->image=$image;
                $user->save();
            }else{
                $notice="<h2 class='text-danger'> The file must contain jpg, jpeg, png </h2>";
                return redirect('/profile')->with('notice',$notice);
            }
            
        }
      
        return redirect('/profile')->with('notice','<h2 class="text-success">Update success</h2>');
        
    }
    //----------------------------------------------admin------------------------------------------
    public function postupdate(Request $request,$id)
    {
        $this->validate($request,
        ['name' => 'required|min:2|max:100',


        ],
        ['name.required' => 'Bạn chưa nhập tên account','name.min' => 'Tên phải có độ dài lớn hơn 1 kí tự','name.max' => 'Tên phải có độ dài nhỏ hơn 100 kí tự',


        ]
                        );
        $User = User::find($id);
        $User->name = $request->name;




        if($request->changepassword == "on")
        {
            $this->validate($request,
                [
                'password' => 'required|min:2|max:100',
                'againpassword' => 'required|same:password'
                ],
                ['password.required' => 'Bạn chưa nhập password','pass.min' => 'password phải có độ dài lớn hơn 1 kí tự','password.max' => 'password phải có độ dài nhỏ hơn 100 kí tự',
                'againpassword.required' => 'Bạn chưa nhập lại password','againpassword.same' => 'password nhập lại chưa khớp'
                ]
                 );
            $User->password = bcrypt($request->password);
        }

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/account/list-all/'.$id)->with('thongbao', 'file hình sai định dạng');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4) ."_". $name;
            while (file_exists("public/uploads/products/".$image))
            {
                $image = Str::random(4) ."_". $name;
            }
            $file->move("public/frontend/uploads/profile/",$image);
            unlink("public/frontend/uploads/profile/".$User->image);
            $User->image = $image;
        }

        $User->save();
        return redirect('admin/account/update/'.$id)->with('thongbao', 'Update thành công');
    }

}

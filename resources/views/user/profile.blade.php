@extends('user.layout')
@section('body')
<main id="main" role="main" style="background-color:rgb(255, 255, 255);">
      
    <section class="form-sec">
      <div class="image"  style="width: 200px; height: auto; margin:0 auto;  margin-bottom: 20px; "> 
        @if(Auth::user()->image==null)
        <img src="{{asset('public/frontend/uploads/profile/profile.png')}}" style="  border-radius: 30%; height:200px" class="rounded" width="155"  id="image">
       
        @else
        <img src="{{asset('public/frontend/uploads/profile/'.Auth::user()->image.'')}}" style=" border-radius: 30%;height:200px" class="rounded"  width="155" id="image">
        @endif
       </div>
      <form action="{{route('update-profile')}}" method="POST" class="contact-form" enctype="multipart/form-data">
        @csrf
        <fieldset>
          <div class="form-group">
            <label for="exampleFormControlSelect1"> select image</label>
            <input type="file" id="inputFile" name="image"  class="form-control" placeholder="choose file">
          </div>
          <script>
              $(document).ready(function(){
                var inputFile=$('#inputFile');
                var image=$('#image');
                $( "#inputFile" ) .change(function () {    
                   var file=this.files[0];
                   console.log(file);
                   if(file){
                     var reader=new FileReader();
                     reader.addEventListener("load",function() {
                       console.log(this);
                       image.attr("src",this.result);
                    });
                    reader.readAsDataURL(file);
                    image.width(200).height(200);
                   }
                });  
               
              });
          </script>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Name</label>
            <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Email</label>
            <input type="text" value="{{$user->email}}"  class="form-control" readonly placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Password</label>
            <input type="password" class="form-control" readonly placeholder="Password">
          </div>
          @if($notice=Session::get('notice'))
                {!!$notice!!}
          @endif
          
          <div class="form-group">
            <button class="btn-primary btn-login" type="submit">Update</button>
          </div>
          
        </fieldset>
      </form>
    </section>
  </main>
  @endsection
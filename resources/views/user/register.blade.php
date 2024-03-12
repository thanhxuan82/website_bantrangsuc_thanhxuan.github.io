
@extends('user.layout')
@section('body')
@php
    use Illuminate\View\Middleware\ShareErrorsFromSession;
@endphp
<!-- contain main informative part of the site -->
<main id="main" role="main">
    <!-- main-banner of the page -->
    <section class="banner" style="background-image: url(public/frontend/images/bg5.png);">
      <span class="sale-percent">SALE OF 50%</span>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
              <div class="caption">
                <h1 class="main-heading heading-1">Login</h1>
                <ul class="list-unstyled breadcrumbs">
                  <li><a href="home.html">Home</a></li>
                  <li><a href="category-page.html">shop</a></li>
                  <li>Register</li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      <span class="year">TRENDS FOR 2016</span>
    </section>
    <!-- form-section of the page -->
    <section class="form-sec">
      <div class="contact-form">
        <fieldset>
          <div class="form-group">
            <input type="text"  class="form-control" id="name" placeholder="Your Name">
          </div>
          <div class="form-group">
            <input type="email"  class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password"  class="form-control" id="password" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="password"  class="form-control" id="repassword" placeholder="RePassword">
          </div>
          <div class="form-group">
            <button class="btn-primary btn-login" id="submit" >Register</button>
          </div>
          <p class="text-success" id="success" hidden>
                Sign Up text-success, <a href="{{url('/login')}}" class="text-warning"><strong>click here !</strong></a>
          </p>
          <p class="text-danger" hidden id="empty">
            not be empty
          </p>
          <p class="text-danger" hidden id="comfirm">
            not comfirm password
          </p>
          <p class="text-danger" hidden id="check-mail">
            check mail please ! have insist or not true
          </p>
        </fieldset>
    </div>
    </section>
  </main>
  <script>
      $( document ).ready(function() {
        $( "#submit" ).click(function() {
            var name=$('#name').val();
            var email=$('#email').val();
            var password=$('#password').val();
            var repassword=$('#repassword').val();
            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if(!name || !email|| !password||!repassword){
                $('#empty').show();
            }else{
                if(password!=repassword){
                    $('#comfirm').show();
                }else if(mailformat.test(email)){
                    var url="{{route('store-user')}}";
                   // alert (url)
                   $.ajax({
                        type:'get',
                        url:url,
                        data:{
                            name: name,
                            email:email,
                            password:password,
                    },

                  success:function(response){

                      
                          $('#empty').hide();
                          $('#comfirm').hide();
                          $('#check-mail').hide();
                           $('#'+response+'').show();
                        //alert(response);

                    }
                    });
                }else{
                    $('#check-mail').show();
                }
            }
        });
            
    });
  </script>

  @endsection
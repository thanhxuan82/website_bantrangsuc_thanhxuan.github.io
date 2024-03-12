@extends('user.layout')
@section('body')
<!-- contain main informative part of the site -->
<main id="main" role="main">
    <!-- main-banner of the page -->
    <section class="banner" style="background-image: url(public/frontend/images/bg4.png);">
      <span class="sale-percent">SALE OF 50%</span>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
              <div class="caption">
                <h1 class="main-heading heading-1">Login</h1>
                <ul class="list-unstyled breadcrumbs">
                  <li><a href="home.html">Home</a></li>
                  <li><a href="category-page.html">shop</a></li>
                  <li>login</li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      <span class="year">TRENDS FOR 2016</span>
    </section>
    <!-- form-section of the page -->
    <section class="form-sec">
        @if(isset($error))
          <p class="text-danger">
                <strong class="text-danger"> {{$error}}</strong>
          </p>
          @endif
      <form action="{{route('login-user')}}" method="post" class="contact-form">
        <fieldset>
            @csrf
          <div class="form-group">
            <input type="email" required name="email" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" required name="password" class="form-control" placeholder="Password">
          </div>
          
          {{-- <div class="form-group"> --}}
            
            <a href="{{url('/login/facebook')}}"><i class="fab fa-facebook" style="font-size: 40px;"></i></a>
           
            <button class="btn-primary btn-login" type="submit">Login</button>
            
          {{-- </div> --}}
          
          <p >
            If you don't have an account, <a href="{{url('/register')}}" class="text-warning"> <strong>click here !</strong></a>
          </p>
          <a href="#">Forget Password ?</a>
          
        </fieldset>
      </form>
    </section>
  </main>
  @endsection
@extends('user.layout')
@section('body')
<main id="main" role="main">
    <!-- main-banner of the page -->
    <section class="banner wow fadeInUp" data-wow-delay="0.4s" style="background-image: url(public/frontend/images/bg6.jpg);">
      <span class="sale-percent">SALE OF 50%</span>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
              <div class="caption">
                <h1 class="main-heading">Shop</h1>
                <ul class="list-unstyled breadcrumbs">
                  <li><a href="home.html">Home</a></li>
                  <li>shop</li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      <span class="year">TRENDS FOR 2016</span>
    </section>
    <!-- product-section of the page -->
    <section class="product-sec wow fadeInUp" data-wow-delay="0.4s">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <ul class="list-unstyled filter-list">
              <li class="active"><a href="#">all</a></li>
              <li><a href="#" data-filter=".Gemstone">Gemstone</a></li>
              <li><a href="#" data-filter=".Sliver">Sliver</a></li>
              <li><a href="#" data-filter=".Gold">Gold</a></li>
              <li><a href="#" data-filter=".Diamond">Diamond</a></li>
              <li><a href="#" data-filter=".brooches">brooches</a></li>
              <li><a href="#" data-filter=".men">men’s</a></li>
            </ul>
          </div>
        </div>
      </div>
     
       
       
   
        <div class="holder" id="masonry-container">
            @foreach($products as $product)
          <!-- product-block of the page -->
          <div class="product-block coll-2 rings {{$product->category}}">
            <div class="over">
              <div class="align-left">
               
                <strong class="title-name"><a href="{{route('details',$product->id)}}">{{ substr($product->name, 0, 15)."..." }}</a></strong>
                <strong class="price"><del>{{$product->price+20}}$</del> {{$product->price}}$</strong>
              </div>
            </div>
            <img class="img-responsive" alt="image description" style="height: 400px; width:400px" src="{{asset('public/uploads/products/'.$product->image1)}}">
            
          </div> 
          @endforeach   
      </div>
     
    </section>
  </main>
  
  @endsection
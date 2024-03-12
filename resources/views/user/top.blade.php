@extends('user.layout')
@section('body')
<main id="main" role="main">
    <!-- main-banner of the page -->
    <section class="banner wow fadeInUp" data-wow-delay="0.4s" style="background-image: url(public/frontend/images/bg9.jpg);">
      <span class="sale-percent">SALE OF 50%</span>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
              <div class="caption">
                <h1 class="main-heading">Top Vote</h1>
                <ul class="list-unstyled breadcrumbs">
                  <li><a href="home.html">Home</a></li>
                  <li>Top Vote</li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      <span class="year">TRENDS FOR 2016</span>
    </section>
    <!-- product-section of the page -->
    <section class="product-sec wow fadeInUp" data-wow-delay="0.4s">
  
      <div class="holder" id="masonry-container">
        <!-- product-block of the page -->
        <div class="product-block coll-1 brooches rings">
            <div class="over">
              <div class="align-left">
                <strong class="title-name"><a href="{{route('details',$top4[0]->product)}}">{{substr($top4[0]->products->name,0,20)}}</a></strong>
                <strong class="price"><del>{{$top4[0]->products->price-20}}$</del> {{$top4[0]->products->price}}$</strong>
              </div>
              <a class="like">
                {{$top4[0]->sumStar}}
                <i class="far fa-star"> </i>
            </a>
            </div>
            
            <img class="img-responsive" alt="image description" src="{{asset('public/uploads/products/'.$top4[0]->products->image1)}}">
          </div>
          <div class="product-block coll-1 necklaces">
            <div class="over">
              <div class="align-left">
                <strong class="title-name"><a href="{{route('details',$top4[1]->product)}}">{{substr($top4[1]->products->name,0,20)}}</a></strong>
                <strong class="price"><del>{{$top4[1]->products->price-20}}$</del> {{$top4[1]->products->price}}$</strong>
              </div>
              <a class="like">
                {{$top4[1]->sumStar}}
                <i class="far fa-star"> </i>
            </a>
            </div>
            <img class="img-responsive" alt="image description" src="{{asset('public/uploads/products/'.$top4[1]->products->image1)}}">
          </div>
      </div>
    </section>
  </main>
  @endsection
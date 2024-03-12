@extends('user.layout')
@section('body')
    <!-- contain main informative part of the site -->
    <main id="main" role="main">
      <!-- main-gallery of the Page -->
      <section class="main-slider">
        <!-- social-networks of the page -->
        <ul class="list-unstyled social-network">
          <li class="facebook"><a href="#" class="icon-facebook"></a></li>
          <li><a href="#" class="icon-twitter"></a></li>
          <li class="instagram"><a href="#" class="icon-instagram"></a></li>
        </ul>
        <!-- Main Slider of the page -->
        <div id="main-slider">
          <!-- Slide of the page -->
          <div class="slide">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="beans-slider">
                    <div class="border">
                      <h1 class="slider-heading">17DTHA2</h1>
                      <div class="img-holder">
                        <img src="{{asset('public/frontend/images/bg1.jpg')}}" alt="image description">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Slide of the page -->
          <div class="slide">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="beans-slider">
                    <div class="border">
                      <h1 class="slider-heading">17DTHA2</h1>
                      <div class="img-holder">
                        <img src="{{asset('public/frontend/images/bg2.jpg')}}" alt="image description">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Slide of the page -->
          <div class="slide">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="beans-slider">
                    <div class="border">
                      <h1 class="slider-heading">17DTHA2</h1>
                      <div class="img-holder">
                        <img src="{{asset('public/frontend/images/bg3.jpg')}}" alt="image description">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    @endsection
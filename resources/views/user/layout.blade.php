<!DOCTYPE html>
<html>

<head>
    <!-- set the encoding of your site -->
    <meta charset="utf-8">
    <!-- set the viewport width and initial-scale on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('public/frontend/images/favicon.png') }}" />
    <title>JONNY TIEN</title>
    <!-- include the site stylesheet -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/fonts.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/slick.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/animate.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/frontend/style.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/color/color.css') }}">
    {{-- frontawsome --}}
    <link href="{{ asset('public/frontend/fontawesome/css/all.min.css') }}" rel="stylesheet">
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- bootstrap --}}
    {{-- ajax --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
</head>

<body>
    <!-- Page Loader -->
    <div id="pre-loader" class="loader-container">
        <div class="loader">
            <img src="{{ asset('public/frontend/images/svg/rings.svg') }}" alt="loader">
        </div>
    </div>
    <!-- main container of all the page elements -->
    <div id="wrapper">
        <!-- header of the page -->
        <header id="header" class="sticky-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- logo of the page -->
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('public/frontend/images/logo.png') }}"
                                    alt="JEWELRY"></a>
                        </div>
                        <div class="nav-holder">
                            <a href="#" class="nav-opener"><span>menu</span></a>
                            <!-- nav of the page -->
                            <nav id="nav">
                                <ul class="list-unstyled">
                                    <li class="">
                                        <a href="{{ url('/') }}">home</a>
                                        
                                    </li>
                                    <li class="mega-drop">
                                        <a href="{{ url('/shop') }}">shop</a>
                                        <div class="drop-holder">
                                            <div class="coll">
                                              <strong class="title">SHOP PAGE</strong>
                                              <ul class="list-unstyled">
                                                <li><a href="{{ url('/shop') }}">All Product</a></li>
                                              </ul>
                                            </div>
                                            <div class="coll">
                                              <strong class="title">PRODUCTS</strong>
                                              <ul class="list-unstyled">
                                                <li><a href="{{ url('/top') }}">Top Products</a></li>
                                              </ul>
                                            </div>
                                            {{-- <div class="coll coll-2">
                                              <strong class="title">LAST CHANCE</strong>
                                              <div class="offer-txt">
                                                <span class="txt">sale</span>
                                                <span class="offer-sale">40%</span>
                                                <span class="txt-about">Pharetra, erat sed <br>fermentum feugiat, velit <br>mauris egestas quam. </span>
                                                <a href="#" class="btn-more">Read more <i class="icon-right-arrow"></i></a>
                                                <div class="img-holder">
                                                  <img src="http://placehold.it/150x100" alt="image description">
                                                </div>
                                              </div>
                                            </div> --}}
                                          </div>
                                    </li>
                                    @if (Auth::check())
                                        <li class="">
                                            <a href="{{ url('/profile') }}">Profile</a>
                                        </li>
                                        <li class="">
                                            <a href="{{ url('/order') }}">Order</a>
                                        </li>
                                    @endif
                                   
                                    <li class="mega-drop">
                                        <a href="{{ url('/list-cart') }}">Cart</a>
                                    </li>
                                    
                                    {{-- <li>
                                        <a href="#">blog</a>
                                        <ul class="list-unstyled drop">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-detail.html">Single Post</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.html">about</a></li> --}}
                                </ul>
                            </nav>
                            <div class="align-right">
                                <ul class="list-unstyled icon-list">
                                    {{-- <li>
                    <a href="#"><img src="{{asset('public/frontend/images/user.png')}}" alt="images description"></a>
                  </li> --}}
                                    <li>
                                        @if (Auth::check())
                                            <a href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i></a>
                                        @else
                                            <a href="{{ url('/login') }}"><i class="fas fa-user-plus"></i></a>
                                        @endif

                                        <a class="btn-search" href="#"><i class="fas fa-search"></i></a>
                                    </li>



                                    <li class="cart-box hidden-xs">
                                        <div class="change-item-cart">
                                            <a class="cart-opener opener-icons" href="javascript:">
                                                <i class="icon-cart"></i>
                                                @if (Session::get('Cart') !== null)
                                                    @php
                                                        $cart = Session::get('Cart');
                                                    @endphp
                                                    <span class="cart-num">{{ $cart->totalQuantity }}</span>
                                                @else
                                                    <span class="cart-num">0</span>
                                                @endif
                                            </a>

                                            <div class="cart-drop">
                                                <div class="cart-holder">
                                                    @if (Session::get('Cart') !== null)
                                                        <strong class="main-title">You have
                                                            <i>{{ $cart->totalQuantity }} items</i> in your
                                                            card</strong>
                                                        <ul class="cart-list list-unstyled">
                                                            @foreach ($cart->products as $product)
                                                                <li>
                                                                    <div class="image">
                                                                        <a href="#"><img alt="Image Description"
                                                                                src="{{ asset('public/uploads/products/' . $product['productInfo']->image1) }}"></a>
                                                                    </div>
                                                                    <div class="description">
                                                                        <span class="product-name"><a
                                                                                href="#">{{ substr($product['productInfo']->name, 0, 20) }}
                                                                                (x{{ $product['quantity'] }})</a></span>
                                                                        <span class="price">{{ $product['price'] }}
                                                                            $</span>
                                                                    </div>

                                                                    <a class="icon-close remove-item" href="javascript:"
                                                                        id="{{ $product['productInfo']->id }}"></a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <div class="total-price-area">
                                                            <span class="title-text">Total</span>
                                                            <span class="price">{{ $cart->totalPrice }} $</span>
                                                        </div>
                                                    @endif

                                                    <a href="{{ url('/list-cart') }}" class="btn"
                                                        style="margin: 2% 15%; width: 70%;">View card</a>
                                                        
                                                    {{-- <a href="#" class="btn"
                                                        style="margin: 2% 15%; width: 70%">checkout</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <script>
            $(document).ready(function() {
                $(".change-item-cart").on("click", ".remove-item", function() {
                    var id = $(this).attr('id');
                    $(".icon-list").addClass("cart-active");
                    var url = "{{ route('deleteitemcart') }}";
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {
                            id: id
                        },

                        success: function(response) {
                            //alert(response)
                            $('.change-item-cart').empty();
                            $('.change-item-cart').html(response);
                            alertify.error('Remove Item in Cart');

                        }
                    });
                });
            });

        </script>
      <script>
        // $(document).ready(function() {
        //     $('.cart-active .cart-opener a').click(function(){
        //         alert (1)
        //     });
        // });

    </script>
        <!-- Search Popup of the page -->
        <div class="search-popup">
            <div class="holder">
                <div class="col">
                    <div class="block-holder">
                        <a href="#" class="close-btn"><i class="icon-close"></i></a>
                        <form action="#" class="submit-form">
                            <fieldset>
                                <label for="search" class="icon-search"></label>
                                <input type="search" id="search">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end header --}}
        @yield('body')

        {{-- footer --}}
        <footer id="footer" class="wow fadeInUp" data-wow-delay="0.4s">
            <span class="free-ship">FREE SHIPPING</span>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-lg-4 txt-holder">
                        <div class="footer-logo">
                            <a href="index.html">jewelry</a>
                        </div>
                        @if (Auth::check())
                            <img src="data:image/png;base64, {!! base64_encode(
    QrCode::format('png')->merge('public/frontend/images/tien.png', 0.3, true)->backgroundColor(255, 255, 0)->color(255, 0, 127)->size(500)->errorCorrection('H')->generate('Thanks, ' . Auth::user()->email . ' https://www.facebook.com/minh.tientorres/'),
) !!}  "
                                style="width: 150px; height:150px">
                        @else
                            <img src="data:image/png;base64, {!! base64_encode(
    QrCode::format('png')->merge('public/frontend/images/tien.png', 0.3, true)->backgroundColor(255, 255, 0)->color(255, 0, 127)->size(500)->errorCorrection('H')->generate('Welcome to Jonny Tien https://www.facebook.com/minh.tientorres/'),
) !!}  "
                                style="width: 150px; height:150px">
                        @endif


                    </div>
                    <div class="col-xs-12 col-sm-4 col-lg-3">
                        <h3>contact us</h3>
                        <!-- Contact of the page -->
                        <ul class="list-unstyled contact-info">
                            <li><i class="icon icon-location"></i>
                                <address>Limited. 222-UTC , EU .</address>
                            </li>
                            <li><i class="icon icon-email"></i><a class="txt" href="#">Support@emtheme.com</a></li>
                            <li><i class="icon icon-phone"></i><a class="txt" href="#">(00)-213 1234567</a></li>
                            <li><i class="icon icon-printer"></i><a class="txt" href="#">(00)-213 1879017</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-lg-5">
                        <h3>intagram feed</h3>
                        <!-- Instagram of the page -->
                        <ul class="list-unstyled instagram-list">
                            <li><a href="#"><img src="{{asset('public/frontend/images/t1.jpg')}}" alt="image description"></a></li>
                            <li><a href="#"><img src="{{asset('public/frontend/images/t3.jpg')}}" alt="image description"></a></li>
                            <li><a href="#"><img src="{{asset('public/frontend/images/t5.jpg')}}" alt="image description"></a></li>
                            <li><a href="#"><img src="{{asset('public/frontend/images/t6.jpg')}}" alt="image description"></a></li>
                            <li><a href="#"><img src="{{asset('public/frontend/images/t1.jpg')}}" alt="image description"></a></li>
                            <li><a href="#"><img src="{{asset('public/frontend/images/t6.jpg')}}" alt="image description"></a></li>
                            <li><a href="#"><img src="{{asset('public/frontend/images/t1.jpg')}}" alt="image description"></a></li>
                            <li><a href="#"><img src="{{asset('public/frontend/images/t5.jpg')}}" alt="image description"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <span class="support">24H SUPPORT</span>
        </footer>
        <!-- Back Top of the page -->
        {{-- <span id="back-top" class="arrow_carrot-up"></span> --}}
    </div>
    <!-- include jQuery -->
    <script src="{{ asset('public/frontend/js/jquery-1.11.3.min.js') }}"></script>
    <!-- include jQuery -->
    <script src="{{ asset('public/frontend/js/plugins.js') }}"></script>
    <!-- include jQuery -->
    <script src="{{ asset('public/frontend/js/jquery.main.js') }}"></script>


    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    
</body>

</html>
<script>
    // $(document).ready(function(){
    //   alert("asdsad")          
    // });

</script>
{{-- end footer --}}

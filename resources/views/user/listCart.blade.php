@extends('user.layout')
@section('body')
    <main id="main" role="main">
        <!-- main-banner of the page -->
        <section class="banner" style="background-image: url(./public/frontend/images/bg8.jpg);">
            <span class="sale-percent">SALE OF 50%</span>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="caption">
                            <h1 class="main-heading heading-2">shopping carT</h1>
                            <ul class="list-unstyled breadcrumbs">
                                <li><a href="home.html">Home</a></li>
                                <li><a href="category-page.html">Shop</a></li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <span class="year">TRENDS FOR 2016</span>
        </section>
        <!-- shoping-cat-detail of the page -->
        <section class="shoping-cat-detail">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-xs-12 col-sm-2">
                        <span class="title">item</span>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <span class="title">Name</span>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <span class="title">price</span>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <span class="title">quantily</span>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <span class="title">total</span>
                    </div>
                </div>
                <hr>
                @if (Session::get('Cart') !== null)
                    @php
                        $cart = Session::get('Cart');
                    @endphp
                    <div id="list-cart">
                        @foreach ($cart->products as $product)


                            <div class="row wow fadeInUp" data-wow-delay="0.3s" style="height: 140px">
                                <div class="detail-holder"  >
                                    <div class="col-xs-12 col-sm-2">
                                        <div class="img-holder">
                                            <img style="height: 120px; width:140px"  src="{{ asset('public/uploads/products/' . $product['productInfo']->image1) }}"
                                                alt="image descripton">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <span class="txt">{{ substr($product['productInfo']->name, 0, 15) }}..</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-2">
                                        <span class="txt" id="price-{{ $product['productInfo']->id }}" data-price="{{ $product['productInfo']->price }}">${{ $product['productInfo']->price }}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">

                                        <input type="number" min="1" onchange="updatecart({{ $product['productInfo']->id }})"
                                            id="quantity-{{ $product['productInfo']->id }}" class="qynt"
                                            data-id="{{ $product['productInfo']->id }}"
                                            value="{{ $product['quantity'] }}">
                                    </div>
                                    <div class="col-xs-12 col-sm-1 " >
                                        <span class="txt totalprice" id="total-{{ $product['productInfo']->id }}">${{ $product['price'] }}</span>
                                    </div>

                                </div>
                            </div>
                            <hr>
                        @endforeach
                @endif
                <div class="row total-pay wow fadeInUp" data-wow-delay="0.3s">
                    {{-- <div class="col-xs-12 col-sm-7">
                        <strong class="title">coupon</strong>
                        <form action="#" class="form">
                            <fieldset>
                                <input type="text" placeholder="Enter promotion code here" class="form-control">
                                <button type="submit" class="btn">apply</button>
                            </fieldset>
                        </form>
                        <a href="#" class="btn-more">Continue <i class="icon-right-arrow"></i></a>
                    </div> --}}
                    @if (Session::get('Cart') !== null)
                        @php
                            $cart = Session::get('Cart');
                        @endphp
                        <div class="col-xs-12 col-sm-5">
                            <div class="total-amunt">
                                
                                {{-- <div class="holder">
                                    <strong class="heading">Tax</strong>
                                    <span class="price">$sale</span>
                                </div> --}}
                                <div class="holder " style="padding: 10px 0;  padding-left:100px">
                                    <strong class="heading">Voucher :</strong>
                                    <span class="price" >Null</span>
                                </div>
                                <div class="holder ">
                                    <strong class="heading">Total :</strong>
                                    <span class="price" style="font-weight: bold; color:rgb(22, 22, 22)" id="totalPrice">${{ $cart->totalPrice }}</span>
                                </div>
                                <a href="{{url('/address')}}" class="btn-primary">process to chectout</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function() {
            $(".change-item-cart").on("click", ".remove-item", function() {
                var id = $(this).attr('id');
                // alert (id)
                var url = "{{ route('deleteitemlistcart') }}";
                $.ajax({
                    type: 'get',
                    url: url,
                    data: {
                        id: id
                    },

                    success: function(response) {
                        $('#list-cart').html(response);


                    }
                });
            });
        });

    </script>

    <script>
        function updatecart(id) {
            var quantity = $("#quantity-" + id + "").val();
            var price= $("#price-" + id + "").data("price");
            var total=quantity*price;
            $("#total-" + id + "").text(price*quantity);
            $("#total-" + id + "").prepend("$");

           var total=0;
            $('.totalprice').each(function(){
                var price=$(this).text().split("$");
                  total+=parseInt(price[1]);
            });
            
            $('#totalPrice').text(total);
            $('#totalPrice').prepend("$");
            var url = "{{ route('updateitemcart') }}";
            var id = $("#quantity-" + id + "").data("id");
                $.ajax({
                    type: 'get',
                    url: url,
                    data: {
                        id: id,
                        quantity:quantity
                    },

                    success: function(response) {
                        $('.change-item-cart').html(response);
                        var notification = alertify.notify('Update quantity Cart Success', 'success', 2, function(){  console.log('dismissed'); });
                    }
                });

        }

    </script>
@endsection

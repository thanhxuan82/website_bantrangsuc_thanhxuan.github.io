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
                    <div class="col-xs-12 col-sm-1">
                        <span class="title">id</span>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <span class="title">Customer</span>
                    </div>
                    <div class="col-xs-12 col-sm-1">
                        <span class="title">Total</span>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <span class="title">QTY</span>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <span class="title">Date</span>
                    </div>
                    <div class="col-xs-12 col-sm-1">
                        <span class="title">Time</span>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <span class="title">Status</span>
                    </div>
                    <div class="col-xs-12 col-sm-1">
                        <span class="title">View</span>
                    </div>
                </div>

                @if (Auth::check())
                    @foreach ($bills as $bill)
                        <div class="row wow fadeInUp" id="row-detail" data-wow-delay="0.2s" style="height: 140px">
                            <div class="col-xs-12 col-sm-1">
                                <span class="txt">#{{ $bill->id }}</span>
                            </div>
                            <div class="col-xs-12 col-sm-2">
                                <span class="txt">{{ $bill->users->name }}</span>
                            </div>
                            <div class="col-xs-12 col-sm-1">
                                <span class="txt" id="price">{{ $bill->totalprice }}</span>
                            </div>
                            <div class="col-xs-12 col-sm-2">
                                <span class="txt" id="price">{{ $bill->totalquantity }}</span>
                            </div>
                            <div class="col-xs-12 col-sm-2 ">
                                <span class="txt totalprice" id="total">{{ $bill->date }}</span>
                            </div>
                            <div class="col-xs-12 col-sm-1 ">
                                <span class="txt totalprice" id="total">{{ $bill->time }}</span>
                            </div>
                            <div class="col-xs-12 col-sm-2 ">
                                @switch($bill->status)
                                    @case(0)
                                    <span class="txt totalprice" style="color: orange">Pedding</span>
                                    @break
                                    @case(1)
                                    <span class="txt totalprice text-warning" style="color: royalblue">Shipping</span>
                                    @break
                                    
                                    @case(2)
                                    <span class="txt totalprice text-success" style="color: yellowgreen">Success</span>
                                    @break
                                    @default

                                @endswitch

                            </div>
                            <div class="col-xs-12 col-sm-1 ">
                                <span class="txt totalprice" id="total"><a href="javascript:"
                                        onclick="viewDetail({{ $bill->id }})" id="view-details"><i
                                            class="far fa-eye"></i></a></span>
                            </div>
                        </div>
                        <hr>

                    @endforeach
                @endif

            </div>
            </div>
        </section>
    </main>
    {{-- modal --}}

    @foreach ($bills as $bill)
        @php
            $details = App\Detailbill::where('bill', $bill->id)->get();
        @endphp

        <div class="modal" id="myModal{{ $bill->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" hidden
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="text-danger fa fa-times"></i></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="text-muted fa fa-shopping-cart"></i>
                            <strong>{{ $bill->id }}</strong> / <strong class="text-warning">{{ $bill->time }} -
                                {{ $bill->date }}</strong>

                        </h4>
                    </div>
                    <div class="modal-body">
                        @foreach ($details as $detail)
                            <table class="pull-left col-md-9">
                                <tbody>
                                    <tr>
                                        <td class="h6"><strong>Name Product :</strong></td>
                                        <td class="h5">{{ substr($detail->products["name"], 0, 20) }}..</td>
                                    </tr>
                                    <tr>
                                        <td class="h6"><strong>Quantity :</strong></td>
                                        <td class="h5">{{ $detail->quantity }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h6"><strong>Price :</strong></td>
                                        <td class="h5">{{ $detail->total / $detail->quantity }}.$</td>
                                    </tr>
                                    <tr>
                                        <td class="h6"><strong>Total :</strong></td>
                                        <td class="h5">{{ $detail->total }}.$</td>
                                    </tr>
                                </tbody>
                                <div class="col-md-3">
                                    <img src="{{ asset('public/uploads/products/' . $detail->products["image1"] . '') }}"
                                        style="width: 85px; height:70px" alt="teste" class="img-thumbnail">
                                </div>
                            </table>

                            <br>
                            <br>
                            <hr class="style16" style="	border-top: 1px solid #8c8b8b;
                                    text-align: center;">


                        @endforeach
                        <div class="clearfix"></div>

                    </div>

                    <div class="modal-footer">

                        <div class="text-right pull-right col-md-5">
                            Total: <br />
                            <span class="h3 text-muted"><strong
                                    class="text-success">${{ $bill->totalprice }}</strong></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        function viewDetail(id) {
            event.preventDefault();
            //alert(id)
            $('#myModal' + id + '').modal('show');
        }

    </script>

@endsection
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />

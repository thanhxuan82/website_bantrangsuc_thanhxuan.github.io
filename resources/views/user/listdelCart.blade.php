@if($newCart !=null)
@foreach ($newCart->products as $product)
<div class="row wow fadeInUp" data-wow-delay="0.4s">
    <div class="detail-holder">
      <div class="col-xs-12 col-sm-2">
        <div class="img-holder">
          <img src="{{asset('public/uploads/products/'.$product['productInfo']->image1)}}" alt="image descripton">
        </div>
      </div>
      <div class="col-xs-12 col-sm-3">
        <span class="txt">{{substr($product['productInfo']->name,0,15)}}..</span>
      </div>
      <div class="col-xs-12 col-sm-2">
        <span class="txt">${{$product['productInfo']->price}}</span>
      </div>
      <div class="col-xs-12 col-sm-3">
          
        <input type="number" id="quantity" class="qynt" value="{{$product['quantity']}}" >
      </div>
      <div class="col-xs-12 col-sm-1">
        <span class="txt">${{$product['price']}}</span>
      </div>
      
    </div>
  </div>
  <hr>
  @endforeach
  @endif
  <div class="row total-pay wow fadeInUp" data-wow-delay="0.4s">
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
    @if(Session::get('Cart')!==null)
    @php
        $cart=Session::get('Cart');
    @endphp
    <div class="col-xs-12 col-sm-5">
      <div class="total-amunt">
        <div class="holder">
          <strong class="heading">Subtotal</strong>
          <span class="price">${{$newCart->totalPrice}}</span>
        </div>
        <div class="holder">
          <strong class="heading">Tax</strong>
          <span class="price">$sale</span>
        </div>
        <div class="holder">
          <strong class="heading">total</strong>
          <span class="price">$total</span>
        </div>
        <a href="{{url('/payment')}}" class="btn-primary">process to chectout</a>
      </div>
    </div>
    @endif
@if($newCart !=null)


<a class="cart-opener opener-icons" href="javascript:">
  <i class="icon-cart"></i>
  <span class="cart-num">{{$newCart->totalQuantity}}</span>
</a>
<div class="cart-drop">
  <div class="cart-holder">
   
      <strong class="main-title">You have <i>{{$newCart->totalQuantity}} items</i> in your card</strong>
    <ul class="cart-list list-unstyled">
      @foreach($newCart->products as $product)
      <li>
        <div class="image">
          <a href="#"><img alt="Image Description" src="{{asset('public/uploads/products/'.$product['productInfo']->image1)}}"></a>
        </div>
        <div class="description">
          <span class="product-name">{{substr($product['productInfo']->name,0,20)}} (x{{$product['quantity']}})</span>
          <span class="price">{{$product['price']}} $</span>
        </div>
        <a class="icon-close remove-item" href="javascript:" id="{{$product['productInfo']->id}}"></a>
      </li>
      @endforeach
    </ul>
    <div class="total-price-area">
      <span class="title-text">Total</span>
      <span class="price">{{$newCart->totalPrice}} $</span>
    </div>
    
    
    <a href="{{url('/list-cart')}}" class="btn" style="margin: 2% 15%; width: 70%;">View card</a>
  </div>

</div>
@endif

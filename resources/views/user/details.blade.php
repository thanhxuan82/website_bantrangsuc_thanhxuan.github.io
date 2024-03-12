@extends('user.layout')
@section('body')
<main id="main" role="main">
    <!-- main-banner of the page -->
    <section class="banner wow fadeInUp" data-wow-delay="0.4s" style="background-image: url(../public/frontend/images/bg7.jpg);">
      <span class="sale-percent">SALE OF 50%</span>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
              <div class="caption">
                <h1 class="main-heading">Shop</h1>
                <ul class="list-unstyled breadcrumbs">
                  <li><a href="home.html">Home</a></li>
                  <li><a href="category-page.html">shop</a></li>
                  <li>product</li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      <span class="year">TRENDS FOR 2020</span>
    </section>
    <!-- product-detial of the page -->
    <section class="product-detial wow fadeInUp" data-wow-delay="0.4s">
      <!-- Slider of the page -->
      <div class="slider">
        <!-- Product Slider of the page -->
        <div class="img-holder product-slider">
          <!-- Slide of the page -->
          <div class="slide">
            <img src="{{asset('public/uploads/products/'.$detail->image1.'')}}" alt="image descrption">
          </div>
          <!-- Slide of the page -->
          <div class="slide">
            <img src="{{asset('public/uploads/products/'.$detail->image2.'')}}" alt="image descrption">
          </div>
          <!-- Slide of the page -->
          <div class="slide">
            <img src="{{asset('public/uploads/products/'.$detail->image3.'')}}" alt="image descrption">
          </div>
          <!-- Slide of the page -->
          <div class="slide">
            <img src="{{asset('public/uploads/products/'.$detail->image4.'')}}" alt="image descrption">
          </div>
        </div>
        <!-- Pagg Slide of the page -->
        <ul class="list-unstyled slick-slider pagg-slider">
          <li><img src="{{asset('public/uploads/products/'.$detail->image1.'')}}" alt="image description"></li>
          <li><img src="{{asset('public/uploads/products/'.$detail->image2.'')}}" alt="image description"></li>
          <li><img src="{{asset('public/uploads/products/'.$detail->image3.'')}}" alt="image description"></li>
          <li><img src="{{asset('public/uploads/products/'.$detail->image4.'')}}" alt="image description"></li>
        </ul>
      </div>
      <!-- Detail Holder of the page -->
      <div class="detial-holder">
        <h2>{{$detail->name}}</h2>
        <span class="product-name">{{$detail->category}}</span>
        <!-- Rank Rating of the page -->
        <div class="rank-rating">
          <span class="total-price">$ {{$detail->price}}</span>
          <ul class="list-unstyled ratings">
            <li><a class="star" id="5" ></a></li>
            <li><a class="star" id="4" ></a></li>
            <li><a class="star" id="3" ></a></li>
            <li><a class="star" id="2" ></a></li>
            <li><a class="star "id="1" ></a></li>
          </ul>
          <input type="text" hidden value="{{$star}}" id="voting">
          <input type="text" hidden value="{{$id}}" id="id_product">
          @if(Auth::check())
          <input type="text" hidden value="{{Auth::user()->id}}" id="user">
          @endif
          <input type="text" hidden value="0" id="user">


          

<script>
 
    
 $( document ).ready(function() {
    $( ".star" ).click(function() {
       var count=$(this).attr("id");
       //alert(count)
       for(var i=0;i<=count;i++){
          $("#"+i+"").addClass('selected');
          
       }
       for(var j=parseInt(count)+1;j<=5;j++){
          $("#"+j+"").removeClass('selected');
       }
       
       
      
});
  
});  
    
</script>
<script>
 
    
  $( document ).ready(function() {
    var voting=$('#voting').val();
     for(var i=0;i<=voting;i++){
          $("#"+i+"").addClass('selected');
       }
      
       $( ".star" ).click(function() {
        if($('#user').val()==0){
          alert("You need to be logged in to do this");
           window.location.href = "http://localhost/jewelry/login";
        }else{
          var voting=$(this).attr("id");
          var user=$('#user').val();
          var id_product=$('#id_product').val();
        
           if (confirm('Are you sure you want to vote product ?')) {
              var url="{{route('vote-product')}}";
                   // alert (url)
                   $.ajax({
                        type:'get',
                        url:url,
                        data:{
                            star: voting,
                            user:user,
                            id_product:id_product,
                    },

                  success:function(response){

                      
                    var notification = alertify.notify(response, 2, function(){  console.log('dismissed'); });

                    }
                    });
      
              }
       
        }
       });
     
 });
     
     
 </script>
        </div>
        <p>{{$detail->description}}</p>
        <div class="txt-wrap">
          <div class="holder">
            <span class="product">Product code</span>
            <strong class="product-code">698309</strong>
          </div>
          {{-- <div class="holder">
            <span class="size">Size</span>
            <ul class="list-unstyled size-list">
              <li><a href="#">s</a></li>
              <li><a href="#">m</a></li>
              <li><a href="#">l</a></li>
              <li class="active"><a href="#">xl</a></li>
            </ul>
          </div> --}}
          <form action="#" class="product-form">
            <fieldset>
              <div class="row-val">
                <label for="qty">qty</label>
                <input type="text" readonly class="qynt" id="qty" value="1">
              
              </div>
              <div class="row-val">
                <label for="clr">color</label>
                <select id="clr">
                  <option>{{$detail->category}}</option>
                </select>
              </div>
            </fieldset>
          </form>
          <a href="javascript:" id="AddCart" style="padding: 20px 60px; width:50%" class="btn"><strong style="color:#c99035"> add to cart</strong></a>
        </div>
      </div>
    </section>
   
   
   
   
    {{-- asdas --}}

    <section>
      <ul>
        <li>
          @foreach($relates as $relate)
            @if($relate->id !=$detail->id)
          <div class="product-block coll-2">
            <div class="over">
              <div class="align-left">
                <strong class="title-name"><a href="{{route('details',$relate->id)}}">{{ substr($relate->name, 0, 15)."..." }}</a></strong>
                <strong class="price"><del>$ {{$detail->price-20}}</del> $ {{$detail->price}}</strong>
              </div>
            </div>
            <img class="img-responsive" alt="image description" src="{{asset('public/uploads/products/'.$relate->image1.'')}}">
          </div>
          @endif
          @endforeach
        </li>
      </ul>
    </section>





    <!-- slider-section of the page -->
    <section class="comment-sec">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="comment-header">
              <h1 id="count_comment">{{$count}} Commnet</h1>
              <div class="share-social">
                <span class="txt pull-left">Share</span>
                <!-- Social Network of the page -->
                <ul class="list-unstyled social-network">
                  <li><a class="icon-pinterest" href="#"></a></li>
                  <li><a class="icon-twitter" href="#"></a></li>
                  <li><a class="icon-facebook" href="#"></a></li>
                  <li><a class="icon-google-plus" href="#"></a></li>
                </ul>
              </div>
            </div>
            <div class="leave-comment">
                <h2>post a comment</h2>
                <form action="#" class="comment-form">
                  <fieldset>
                    <div class="form-group">
                      <div class="col-12" >
                        <input type="text" id="content" class="form-control" placeholder="Your Comment" style="height: 150px;">
                      </div>
                    </div>
                    
                  
                    <div class="form-group">
                      <button  id="comment" class="btn-primary">post comment</button>
                    </div>
                  </fieldset>
                </form>
              </div>
              <div id="listcmt">
            @foreach($comments as $comment)
           
            <ul class="list-unstyled" id="comment-info">
              <li>
                <div class="img-holder">
                  <img src="{{asset('public/frontend/uploads/profile/'.$comment->users->image.'')}}" style="height: 80px" alt="image description">
                </div>
                <!-- Comment Info of the page -->
                <div class="comment-info">
                  <div class="header">
                    <div class="heading">
                      <h2>{{$comment->users->name}}</h2>
                      <time class="time" datetime="2016-04-03 20:00">{{$comment->date}} | {{$comment->time}} am</time>
                    </div>
                    <a href="#" class="btn-reply">Reply</a>
                  </div>
                  <p>{{$comment->content}}</p>
                </div>
              </li>
            </ul>
          
            @endforeach
          </div>
            <!-- Leave Comment of the page -->
            
          </div>
        </div>
      </div>
    </section>
  </main>
  

  <script>
      $( document ).ready(function() {
         $( "#comment" ).click(function() {
          event.preventDefault();
          if($('#user').val()==0){
            alert("You need to be logged in to do this");
            //window.open("http://localhost/jewelry/login");
        }else{
              var content=$('#content').val();
              var id_product=$('#id_product').val();
               if(!content){
                  alert('null content');
               }else{

               
              var url="{{route('comment')}}";
                   $.ajax({
                        type:'get',
                        url:url,
                        data:{   
                          content:content,
                          id_product:id_product,
                    },

                  success:function(response){
                     
                      $('#content').val(null);
                     
                       $('#listcmt').html(response);
                       alertify.alert('Notice', 'Posted Your Commnet', function(){ alertify.success('Ok'); });


                    }
                 });
              }
            }
      
        });
  
});  
  </script>
  <script>
       $( document ).ready(function() {
        $( "#AddCart" ).click(function() {
          var id_product=$('#id_product').val();
       
          var url="{{route('addcart')}}";
                   $.ajax({
                        type:'get',
                        url:url,
                        data:{   
                          id_product:id_product,
                         
                    },

                  success:function(response){
                    //alert(response)
                    
                     $('.change-item-cart').html(response);
                     var notification = alertify.notify('Add Cart Success', 'success', 2, function(){  console.log('dismissed'); });

                    }
                 });
        });
       });
  </script>
{{-- add cart --}}

  


  @endsection
  
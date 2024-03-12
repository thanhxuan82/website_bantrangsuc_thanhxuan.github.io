@extends('admin.layout')
@section('body')

<div class="span9">
    
    <div class="content">
       
        <div class="module">
            <div class="module-head">
                <h3>List Product</h3>
                <form class="navbar-search pull-left input-append" action="#">
                    <input type="text" class="span3" id="search-phim">
                    <button class="btn" type="button">
                        <i class="icon-search"></i>
                    </button>
                </form>
                
            </div>
            
            <div class="module-body">
                <table class="table" style="width: 100%">
                  <thead>
                    <tr>
                      <th style="width: 2%">Num</th>
                      <th style="width: 25%">Name</th>
                      <th style="width: 5%">Category</th>
                      <th style="width: 15%">Image 1</th>
                      <th style="width: 15%">Image 2</th>
                      <th style="width: 15%">Image 3</th>
                      <th style="width: 15%">Image 4</th>
                      <th style="width: 10%">Price</th>
                      <th style="width: 10%">Quatity</th>
                      <th style="width: 10%">Action</th>
                    </tr>
                  </thead>
                  <tbody id="list-product">
                    @foreach($products as $product)
                    <tr>
                    
                        <td>{{$i++}}</td>
                        <td>{{ substr($product->name, 0, 15)."..." }}</td>
                        <td>{{$product->category}}</td>
                        <td><img style="height: 60px; width: 100px" src="{{asset('public/uploads/products/'.$product->image1)}}" alt=""></td>
                        <td><img style="height: 60px; width: 100px"  src="{{asset('public/uploads/products/'.$product->image2)}}" alt=""></td>
                        <td><img style="height: 60px; width: 100px"  src="{{asset('public/uploads/products/'.$product->image3)}}" alt=""></td>
                        <td><img style="height: 60px; width: 100px"  src="{{asset('public/uploads/products/'.$product->image4)}}" alt=""></td>
                        <td>{{$product->price}}.$</td>
                        <td>{{$product->quantity}}</td>
                        <td><a href="update-product/{{ $product->id }}"><i class="fas fa-edit"></i></a> | <a href="delete-product/{{ $product->id }}" onclick="confirm('do you want to delete ?')"><i class="fas fa-trash-alt"></i></a></td>
                    
                    </tr>
                    @endforeach
                  </tbody>
                </table>
    <br />
    {{ $products->links('admin.pagination') }}

        
    </div><!--/.content-->
</div>
<script type="text/javascript">
  $(document).ready(function(){
  $('#search-phim').on('keyup',function(){
      var key = $(this).val();
      var url="{{route('search-product')}}";
      if($(this).val()==null){
                key='';
      }    
      $.ajax({
               type:'get',
                url:url,
                data:{
                  key:key,
                    },

                  success:function(response){

                      
                    //alert(response)
                      $('#list-product').html(response);
                        //alert(response);

                    }
                    });         
              
  });
  });
 
</script>
@endsection
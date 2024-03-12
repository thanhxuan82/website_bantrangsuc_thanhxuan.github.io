@extends('admin.layout')
@section('body')

<div class="span9">

    <div class="content">
        @if (session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
        @endif
        <div class="module">
            {{-- <div class="module-head">
                <h3>List Product</h3>
                <form class="navbar-search pull-left input-append" action="#">
                    <input type="text" class="span3" id="search-phim">
                    <button class="btn" type="button">
                        <i class="icon-search"></i>
                    </button>
                </form>

            </div> --}}

            <div class="module-body">

                <table class="table" style="width: 100%">

                  <thead>
                    <tr>
                      <th style="width: 1%">Num</th>
                      <th style="width: 20%">Name</th>
                      <th style="width: 25%">Address</th>
                       <th style="width: 14%">Num Phome</th> 
                      <th style="width: 25%">Date</th>
                      <th style="width: 15%">Status</th>


                      <th style="width: 10%">Action</th>
                    </tr>
                  </thead>
                  <tbody id="list-product">
                    @foreach($bills as $bi)
                    <tr>

                        <td>{{$i++}}</td>
                        <td>{{ substr($bi->users->name, 0, 15) }}</td>
                        <td>{{$bi->address_user->city}}, {{$bi->address_user->district}}, {{$bi->address_user->address}}</td>
                         <td>{{$bi->address_user->phone}}</td> 
                        <td>{{$bi->date}} <br> {{$bi->time}}</td>
                        <td>
                        @if($bi->status == 0)
                            <span class="label label-success">Chờ duyệt</span>
                        @elseif($bi->status == 1)
                            <span class="label label-danger">Đang giao</span>
                        @elseif($bi->status == 2)
                            <span class="label label-danger">Hoàn thành</span>
                        @endif
                        </td>

                        <td>
                            <li class="dropdown">
                                <a href="#"  class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-edit"></i>

                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    @if($bi->status == 0)
                                        <li><a style="color:blue;" href="status1/{{ $bi->id }}"><i class="icon-file-pdf"></i> Đang giao </a></li>
                                        <li><a style="color:blue;" href="status2/{{ $bi->id }}"><i class="icon-file-pdf"></i> Hoàn thành </a></li>
                                    @elseif($bi->status == 1)
                                        <li><a style="color:blue;" href="status0/{{ $bi->id }}"><i class="icon-file-pdf"></i> Kiểm duyệt</a></li>
                                        <li><a style="color:blue;" href="status2/{{ $bi->id }}"><i class="icon-file-pdf"></i> Hoàn thành</a></li>

                                    @endif

                                    <li><a href="javascript:" onclick="viewDetail({{ $bi->id }})" id="view-details"><i class="icon-file-pdf"></i>Detail</a> </li>

                                    <li><a style="color:red;" href="delete/{{ $bi->id }}"><i class="icon-file-excel"></i> Xóa</a></li>

                                </ul>
                            </li>


                    </tr>
                    @endforeach
                  </tbody>
                </table>
    <br />


    {{--  /////////////modal////////////////////////////////  --}}
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
                                        <td class="h5">{{ substr($detail->products->name, 0, 20) }}..</td>
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
                                <br>
                                <div class="col-md-3">
                                    <img src="{{ asset('public/uploads/products/' . $detail->products->image1 . '') }}"
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

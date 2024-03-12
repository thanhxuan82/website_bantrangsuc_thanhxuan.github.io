@extends('admin.layout')
@section('body')
<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Tables</h3>
            </div>
            @if (session('thongbao'))
            <div class="alert alert-success">
                {{ session('thongbao') }}
            </div>
            @endif
            <div class="module-body">
                <p>
                    <strong>Default</strong>
                    -
                    <small>table class="table"</small>
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Images</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($User as $ac)
                        @if ($ac->role != 1)
                            <tr>
                            <td>{{ $ac->id }}</td>
                            <td>{{ $ac->name }}</td>
                            <td>{{ $ac->email }}</td>
                            <td><img class="img-responsive" style="height: 70px; width: 90px" src="{{asset('public/frontend/uploads/profile/'.$ac->image)}}" alt="Avatar"></td>
                            <td>
                                <a href="update/{{ $ac->id }}">
                                    <i class="icon-upload"></i>

                                </a>
                                |
                                <a href="delete/{{ $ac->id }}">
                                    <i class="icon-remove"></i>

                                </a>
                            </td>
                            </tr>
                        @endif
                    @endforeach
                  </tbody>
                </table>
    <br />

    </div><!--/.content-->
</div>
@endsection
@extends('admin.layout')
@section('body')

				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Forms</h3>
							</div>
							<div class="module-body">


                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{ $err }} <br />
                                    @endforeach
                                </div>

                                @endif

                                @if (session('thongbao'))
                                    <div class="alert alert-success">
                                        {{ session('thongbao') }}
                                    </div>
                                @endif
									<br />

									<form class="form-horizontal row-fluid" action="create" method="POST" >
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
										<div class="control-group">
											<label class="control-label" for="basicinput">Họ và tên</label>
											<div class="controls">
												<input type="text" name="name" id="name" placeholder="Nhập họ và tên..." class="span8">

											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Email</label>
											<div class="controls">
												<input type="email" name="email" id="email" placeholder="Nhập email..." class="span8" >
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Mật khẩu</label>
											<div class="controls">
												<input type="password" name="password" id="password" placeholder="Nhập password..." class="span8" >
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Nhập lại mật khẩu</label>
											<div class="controls">
												<input type="password" name="againpassword" id="againpassword" placeholder="Nhập lại password..." class="span8" >
											</div>
										</div>


										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn">Create</button>
											</div>
										</div>
									</form>
							</div>
						</div>



					</div><!--/.content-->
				</div><!--/.span9-->
@endsection
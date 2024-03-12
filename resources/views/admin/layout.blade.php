<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="{{ asset('public/frontend/images/admin.png') }}" />
	<title>Edmin</title>
	<link type="text/css" href="{{asset('public/backend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<link type="text/css" href="{{asset('public/backend/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link type="text/css" href="{{asset('public/backend/css/theme.css')}}" rel="stylesheet">
	<link type="text/css" href="{{asset('public/backend/images/icons/css/font-awesome.css')}}" rel="stylesheet">
	{{-- frontawsome --}}
	<link href="{{asset('public/frontend/fontawesome/css/all.min.css')}}" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>

  {{-- bootstrap --}}

  {{-- ajax --}}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="{{url('/admin')}}">
			  		Edmin
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav nav-icons">
						<li class="active"><a href="#">
							<i class="icon-envelope"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-eye-open"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-bar-chart"></i>
						</a></li>
					</ul>

					{{-- <form class="navbar-search pull-left input-append" action="#">
						<input type="text" class="span3">
						<button class="btn" type="button">
							<i class="icon-search"></i>
						</button>
					</form> --}}

					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Item No. 1</a></li>

								<li><a href="#">Don't Click</a></li>
								<li class="divider"></li>
								<li class="nav-header">Example Header</li>
								<li><a href="#">A Separated link</a></li>
															</ul>
						</li>

						<li><a href="#">
							Support
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="{{asset('public/backend/images/user.png')}}" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Your Profile</a></li>
								<li><a href="#">Edit Profile</a></li>
								<li><a href="#">Account Settings</a></li>
								<li class="divider"></li>
								<li><a href="{{ url('/logout') }}">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="sidebar">

						<ul class="widget widget-menu unstyled">
							<li class="active">
								<a href="{{url('/admin')}}">
									<i class="menu-icon icon-dashboard"></i>
									Dashboard
								</a>
							</li>
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="fas fa-gem"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Product
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="{{url('/admin/list-product')}}">
											<i class="icon-inbox"></i>
											List Product
										</a>
									</li>
									<li>
										<a href="{{url('/admin/add-product')}}">
											<i class="icon-inbox"></i>
											Add Product
										</a>
									</li>

								</ul>
							</li>
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages1">
									<i class="fas fa-users"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									User
								</a>
								<ul id="togglePages1" class="collapse unstyled">
									<li>
										<a href="{{route('listAccount')}}">
											<i class="icon-inbox"></i>
											List User
										</a>
									</li>
									<li>
										<a href="{{route('createAccount')}}">
											<i class="icon-inbox"></i>
											Add User
										</a>
									</li>

								</ul>
							</li>
							{{-- <li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages2">
									<i class="fas fa-vest"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Category
								</a>
								<ul id="togglePages2" class="collapse unstyled">
									<li>
										<a href="{{url('/admin/list-product')}}">
											<i class="icon-inbox"></i>
											List Category
										</a>
									</li>
									<li>
										<a href="other-user-profile.html">
											<i class="icon-inbox"></i>
											Add Category
										</a>
									</li>

								</ul>
							</li> --}}

                            <li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages3">
									<i class="fas fa-vest"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Bill
								</a>
								<ul id="togglePages3" class="collapse unstyled">
									<li>
										<a href="{{route('listBill')}}">
											<i class="icon-inbox"></i>
											List Bill
										</a>
									</li>


								</ul>
							</li>


							<li>
								<a href="task.html">
									<i class="menu-icon icon-tasks"></i>
									Tasks
									<b class="label orange pull-right">19</b>
								</a>
							</li>

						</ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
							<li>
								<a href="message.html">
									<i class="fas fa-money-bill"></i>
									Bill
									<b class="label green pull-right">11</b>
								</a>
							</li>
                                <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>Typography </a></li>
                                {{-- <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
                                <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
                                <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li> --}}
                            </ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
							{{-- <li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									More Pages
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="other-login.html">
											<i class="icon-inbox"></i>
											Login
										</a>
									</li>
									<li>
										<a href="other-user-profile.html">
											<i class="icon-inbox"></i>
											Profile
										</a>
									</li>
									<li>
										<a href="other-user-listing.html">
											<i class="icon-inbox"></i>
											All Users
										</a>
									</li>
								</ul>
							</li> --}}

							<li>
								<a href="#">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->

                @yield('body')
				@yield('script')

			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">


			<b class="copyright">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved.
		</div>
	</div>

	<script src="{{asset('public/backend/scripts/jquery-1.9.1.min.js')}}"></script>
	<script src="{{asset('public/backend/scripts/jquery-ui-1.10.1.custom.min.js')}}"></script>
	<script src="{{asset('public/backend/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/backend/scripts/datatables/jquery.dataTables.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>

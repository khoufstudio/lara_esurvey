
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/colors.min.css') }}" rel="stylesheet" type="text/css">
	<link rel="{{ asset('plugin/packageswlt/dist/sweetalert2.min.js') }}">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('js/backend/app.js') }}" defer></script>
	<!-- /theme JS files -->

</head>

<body>
	<div id="app">
		<!-- Main navbar -->
		<div class="navbar navbar-expand-md navbar-dark">
			<div class="navbar-brand">
				<a href="index.html" class="d-inline-block">
					<img src="../../../../global_assets/images/logo_light.png" alt="">
				</a>
			</div>

			<div class="d-md-none">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
					<i class="icon-tree5"></i>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="navbar-mobile">
				<ul class="navbar-nav">

				</ul>

				<span class="ml-md-3 mr-md-auto">&nbsp;</span>

				<ul class="navbar-nav">

					<li class="nav-item dropdown dropdown-user">

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
						<a href="#" class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						<i class="icon-switch2"></i> Logout</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div class="navbar navbar-expand-md navbar-light">
		<div class="text-center d-md-none w-100">
			<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-navigation">
				<i class="icon-unfold mr-2"></i>
				Navigation
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-navigation">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="index.html" class="navbar-nav-link">
						<i class="icon-newspaper mr-2"></i>
						Page
					</a>
				</li>

				<li class="nav-item">
					<router-link to="/berita" class="navbar-nav-link">
						<i class="icon-newspaper mr-2"></i>
						<span>
							Berita
						</span>
					</router-link>
				</li>




			</ul>
		</div>
	</div>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">		

				<div class="container-fluid">
					<div class="row">



						<router-view></router-view>
						<vue-progress-bar></vue-progress-bar>


					</div>
				</div>
			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2015 - 2018. 
					</span>

				</ul>
			</div>
		</div>
		<!-- /footer -->

	</div>
	<!-- /main content -->

</div>
<!-- /page content -->

</div>
@yield('script')

<script src="/js/app.js"></script>


</body>
</html>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>E-SURVEY | @yield('title')</title>

	<!-- Global stylesheets -->
	
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/colors.min.css') }}" rel="stylesheet" type="text/css">
	<link rel="{{ asset('plugin/packageswlt/dist/sweetalert2.min.js') }}">
	<link rel="{{ asset('css/backend/fancybox.min.css') }}" media="screen">
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="{{ asset('css/backend/treeview.css') }}">
  <!-- /global stylesheets -->
  
  {{-- Added Stylesheets --}}
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<!-- Core JS files -->
	<script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/tables/footable/footable.min.js') }}"></script>

	<script src="{{ asset('global_assets/js/plugins/forms/validation/validate.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	{{-- <script src="{{ asset('global_assets/js/demo_pages/extra_sweetalert.js') }}"></script> --}}

	<script src="{{ asset('global_assets/js/plugins/buttons/ladda.min.js') }}" defer></script>
	<script src="{{ asset('js/backend/app.js') }}" defer></script>
	<script src="{{ asset('global_assets/js/demo_pages/table_responsive.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/dashboard.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/form_validation.js') }}"></script>
	<script src="{{ asset('plugin/packageswlt/dist/sweetalert2.all.min.js') }}"></script>
	<script src="{{ asset('plugin/packageswlt/dist/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/editors/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/editor_ckeditor.js') }}"></script>
	<script src="{{ asset('js/backend/treeview.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/components_buttons.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/media/fancybox.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/form_inputs.js') }}"></script>

	<!-- Theme JS files -->
	<script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/pickers/anytime.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/pickers/pickadate/legacy.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/notifications/jgrowl.min.js') }}"></script>

	<script src="{{ asset('global_assets/js/demo_pages/picker_date.js') }}"></script>
  <!-- /theme JS files -->
  
  {{-- Added JS --}}
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  {{-- Chart JS --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="" class="d-inline-block">
			{{-- <img src="{{ asset('images/logo4.png') }}" alt="" style="width: 187px;height:32px"> --}}
				<h6 style="font-size: 20px;
				color: white;
				font-weight: bold;
				letter-spacing: 2px;
				margin-bottom: 0px;">E-SURVEY</h6>
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				<li class="nav-item dropdown">
				

					<div class="dropdown-menu dropdown-content wmin-md-350">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Git updates</span>
							<a href="#" class="text-default"><i class="icon-sync"></i></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon"><i class="icon-git-pull-request"></i></a>
									</div>

									<div class="media-body">
										Drop the IE <a href="#">specific hacks</a> for temporal inputs
										<div class="text-muted font-size-sm">4 minutes ago</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-transparent border-warning text-warning rounded-round border-2 btn-icon"><i class="icon-git-commit"></i></a>
									</div>
									
									<div class="media-body">
										Add full font overrides for popovers and tooltips
										<div class="text-muted font-size-sm">36 minutes ago</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-transparent border-info text-info rounded-round border-2 btn-icon"><i class="icon-git-branch"></i></a>
									</div>
									
									<div class="media-body">
										<a href="#">Chris Arney</a> created a new <span class="font-weight-semibold">Design</span> branch
										<div class="text-muted font-size-sm">2 hours ago</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon"><i class="icon-git-merge"></i></a>
									</div>
									
									<div class="media-body">
										<a href="#">Eugene Kopyov</a> merged <span class="font-weight-semibold">Master</span> and <span class="font-weight-semibold">Dev</span> branches
										<div class="text-muted font-size-sm">Dec 18, 18:36</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon"><i class="icon-git-pull-request"></i></a>
									</div>
									
									<div class="media-body">
										Have Carousel ignore keyboard events
										<div class="text-muted font-size-sm">Dec 12, 05:46</div>
									</div>
								</li>
							</ul>
						</div>

						<div class="dropdown-content-footer bg-light">
							<a href="#" class="text-grey mr-auto">All updates</a>
							<div>
								<a href="#" class="text-grey" data-popup="tooltip" title="Mark all as read"><i class="icon-radio-unchecked"></i></a>
								<a href="#" class="text-grey ml-2" data-popup="tooltip" title="Bug tracker"><i class="icon-bug2"></i></a>
							</div>
						</div>
					</div>
				</li>
			</ul>

			<span class="badge bg-success ml-md-3 mr-md-auto">&nbsp</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
						<span>{{ Auth::user()->name }}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
					
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
						<a href="#" class="dropdown-item" href="{{ route('logout.admin') }}"
						onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
													<i class="icon-switch2"></i> Logout</a>

						<form id="logout-form" action="{{ route('logout.admin') }}" method="POST" style="display: none;">
								@csrf
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
								<div class="font-size-xs opacity-50">
									{{-- <i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA --}}
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<a href="#" class="text-white"><i class="icon-cog3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
						{{-- <li class="nav-item">
							<a href="/admin/home" class="nav-link">
								<i class="icon-home4 blue"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li> --}}

						{{-- <li class="nav-item">
							<router-link to="/admin/developer" class="nav-link">
								<i class="icon-code"></i>
								<span>
									Developer
								</span>
							</router-link>
						</li> --}}

						@php
								menu_nav(Auth::user()->id_user_group);
						@endphp
						<!-- Main -->						

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">@yield('menu')</span> - @yield('submenu')</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
		
				
				</div>
		
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> @yield('menu')</a>
							<span class="breadcrumb-item active">@yield('submenu')</span><span class="breadcrumb-item active">@yield('submenu2')</span>
						</div>
		
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
		
				
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">
				<div class="row">
					@yield('content')
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
						&copy; 2019. <a href="#"> E-SURVEY</a>
					</span>

				<!-- 	<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
						<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
					</ul> -->
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->



	<script>
			const Toast = Swal.mixin({
			  toast: true,
			  position: 'top-end',
			  showConfirmButton: false,
			  timer: 3000
			});

      @if(Session::has('success'))
          Toast.fire({
						  type: 'success',
						  title: "{{ Session::get('success') }}"
						})
      @endif

      @if(Session::has('info'))
          Toast.fire({
						  type: 'success',
						  title: "{{ Session::get('info') }}"
						})
      @endif
      

	</script>
    
	@yield('script')

<script src="/js/app.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="INSPIRO" />
	<meta name="description" content="Themeforest Template Polo">

	<!-- Document title -->
	<title>Survey Dephub</title>
	<link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('frontend_assets/css/plugins.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend_assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend_assets/css/responsive.css') }}" rel="stylesheet">


	<!-- Template color -->
	<link href="{{ asset('frontend_assets/css/color-variations/red-dark.css') }}" rel="stylesheet" type="text/css" media="screen" title="blue">
	<script src="{{ asset('js/backend/app.js') }}" defer></script>
	<script src="{{ asset('frontend_assets/js/jquery.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="{{ asset('frontend_assets/js/jssor.slider-27.5.0.min.js') }}"></script>
	{{-- <link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css"> --}}

	<style>
		#mainMenu nav > ul > li > a {
			color: #fff;
			padding: 5px 3px;
			font-size: 11px;
		}

		#mainMenu nav > ul > li > a:hover {
			color: orange;
		}

		#header .header-inner #logo a > img, #header #header-wrap #logo a > img{
			height: 69px;
		}

		#header .header-inner #logo, #header #header-wrap #logo {
			height: 60px;
		}

		.grid-articles .post-entry:first-child{
			width: 75% !important;
		}
	</style>
</head>

<body>
	<!-- Body Inner -->    
	<div class="body-inner">
		<div id="app">
			<header-bar></header-bar>  
			<router-view></router-view>
		</div>
	</div>
	<!-- end: Body Inner -->

	<!-- Scroll top -->
	<a id="scrollTop"><i class="icon-chevron-up1"></i><i class="icon-chevron-up1"></i></a>
	<!--Plugins-->
	<script src="{{ asset('frontend_assets/js/plugins.js') }}"></script>

	<!--Template functions-->
	<script src="{{ asset('frontend_assets/js/functions.js') }}"></script>
	<script src="/js/app.js"></script>

</body>
</html>

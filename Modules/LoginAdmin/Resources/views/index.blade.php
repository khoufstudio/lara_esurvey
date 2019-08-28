
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>E-SURVEY | Login</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/backend/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    
    <script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Core JS files -->
	<script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

	<script src="{{ asset('js/backend/app.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/login.js') }}"></script>
	<!-- /theme JS files -->

</head>

<style>
	.background-page {
		background: rgb(92,85,201);
		background: linear-gradient(180deg, rgba(92,85,201,1) 1%, rgba(90,90,223,1) 42%, rgba(60,119,131,1) 100%);
	}

	.text-login {
    /* font-weight: bold; */
    text-transform: uppercase;
    text-align: center;
    font-size: 35px;
    color: #2196f3;
    /* color: rgba(90,90,223,1); */
    text-shadow: rgb(0, 0, 0, 0.34) 2px 2px 2px;
	}
</style>


<body>

	<!-- Page content -->
	<div class="page-content background-page">
	{{-- <div class="page-content" style="background-color: #1C2D6A;"> --}}

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
        <form class="login-form wmin-sm-400" method="POST" action="{{ route('masuk') }}">
            @csrf
					<div class="card mb-0">
						<ul class="nav nav-tabs nav-justified alpha-grey mb-0">
							<li class="nav-item"><a href="#login-tab1" class="nav-link border-y-0 border-left-0 active" data-toggle="tab"><h2 class="my-1 text-login"><strong>E-SURVEY</strong></h2></a></li>
						</ul>
						<div class="tab-content card-body">
							<div class="tab-pane fade show active" id="login-tab1">
								<div class="text-center mb-3">
									{{-- <img src="{{ asset('images/logo_dagri.png') }}" style="width: 100px;height:auto"> --}}
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
                 <input id="login" type="text"
									       class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
									       name="login" value="{{ old('username') ?: old('email') }}" required autofocus>

									@if ($errors->has('username') || $errors->has('email'))
									    <span class="invalid-feedback">
									        <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
									    </span>
									@endif
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>

								<div class="form-group d-flex align-items-center">
									<div class="form-check mb-0">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('ingat saya') }}
                                        </label>
									</div>

									<a href="login_password_recover.html" class="ml-auto">Lupa Password?</a>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Masuk</button>
								</div>

								{{-- <span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span> --}}
							</div>
							
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>

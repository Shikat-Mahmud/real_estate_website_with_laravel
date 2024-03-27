<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Signup</title>
	@include('frontend.includes.css')
</head>
<body>

	<!-- Loader -->
	<div class="page-loader">
		<div class="page-loader-inner">
			<img src="assets/img/icons/loader.svg" alt="Loader">
			<label><i class="fa-solid fa-circle"></i></label>
			<label><i class="fa-solid fa-circle"></i></label>
			<label><i class="fa-solid fa-circle"></i></label>
		</div>
	</div>
	<!-- /Loader -->

	<!-- Main Wrapper -->
	<div class="main-wrapper login-body">
		<div class="container">
			<!-- Header -->
			<header class="log-header">
				<a href="{{ route('home') }}"><img class="img-fluid logo-dark"
						style="width: auto !important; height: 70px !important; padding: 5px !important; margin-top: 10px !important;"
						src="{{asset('storage/'.$setting->logo) }}" alt="Logo"></a>
			</header>
			<!-- /Header -->

			<div class="login-wrapper" style="height: calc(80vh - 80px) !important;">
				<div class="loginbox">
					<div class="login-auth">
						<div class="login-auth-wrap">
							<h1>Signup! <span class="d-block"> New Account.</span></h1>
							<form method="POST" action="{{ route('register') }}">
								@csrf

								<!-- Name -->
								<div class="form-group">
									<label class="form-label" for="name" :value="__('Name')">Name <span>*</span></label>
									<input id="name" name="name" :value="old('name')" required autofocus
										autocomplete="name" type="text" class="form-control" placeholder="Enter Name">
									<x-input-error :messages="$errors->get('name')" class="mt-2" style="color: #FF0000;" />
								</div>

								<!-- Email Address -->
								<div class="form-group">
									<label class="form-label" for="email" :value="__('Email')">Email
										<span>*</span></label>
									<input id="email" class="form-control" type="email" name="email"
										:value="old('email')" required autocomplete="username"
										placeholder="Enter Email">
									<x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #FF0000;"  />
								</div>

								<!-- Password -->
								<div class="form-group">
									<label for="password" :value="__('Password')" class="form-label">Password
										<span>*</span></label>
									<div class="pass-group">
										<input id="password" name="password" type="password"
											class="form-control pass-input" required autocomplete="new-password"
											placeholder="Enter Password">
										<span class="fas fa-eye toggle-password"></span>
										<x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #FF0000;" />
									</div>
								</div>

								<!-- Confirm Password -->
								<div class="form-group">
									<label class="form-label" for="password_confirmation"
										:value="__('Confirm Password')">Confirm Password <span>*</span></label>
									<div class="pass-group">
										<input for="password_confirmation" name="password_confirmation" required
											autocomplete="new-password" :value="__('Confirm Password')" type="password"
											class="form-control" placeholder="Enter Confirm Password">
										<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: #FF0000;" />
									</div>
								</div>

								<button class="btn btn-outline-light w-100 btn-size" type="submit">{{ __('Sign Up')
									}}</button>



								<div class="text-center dont-have">{{ __('Already registered?') }}
									<a href="{{ route('login') }}">Sign In</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- /Main Wrapper -->
	@include('frontend.includes.js')


</body>

</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Login</title>
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

        <!-- Session Status -->

        <div class="main-wrapper login-body">
			<div class="container">
				<!-- Header -->
				<header class="log-header">
					<a href="{{ route('home') }}"><img class="img-fluid logo-dark" style="width: auto !important; height: 70px !important; padding: 5px !important; margin-top: 10px !important;" src="{{asset('storage/'.$setting->logo) }}" alt="Logo"></a>
				</header>
				<!-- /Header -->

                <x-auth-session-status class="mb-4" :status="session('status')" />

				<div class="login-wrapper" style="height: calc(80vh - 80px) !important;">
					<div class="loginbox">						
						<div class="login-auth">
							<div class="login-auth-wrap">
								<h1>Login</h1>							
								<form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email Address -->
									<div class="form-group">
										<label class="form-label"  for="email" :value="__('Email')" >Email <span>*</span></label>
										<input id="email" type="email" class="form-control"  placeholder="Enter Email" name="email" :value="old('email')"  required autofocus autocomplete="username" >
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #FF0000;" />
									</div>

                                    <!-- Password -->
									<div class="form-group">
										<label class="form-label"  for="password" :value="__('Password')" >Password <span>*</span></label>
										<div class="pass-group">
											<input type="password" id="password" class="form-control pass-input" placeholder="Enter Password" name="password" required autocomplete="current-password">
											<span class="fas fa-eye toggle-password"></span>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #FF0000;" />
										</div>
									</div>								
									<div class="form-group mb-5">
                                    @if (Route::has('password.request'))
										<a class="forgot-link" href="{{ route('password.request') }}">Forgot Password ?</a>
                                        @endif
                                    </div>
									<div class="form-group">
										<label class="custom_check mt-0 mb-0" for="remember_me"><span>{{ __('Remember me') }}</span>
											<input type="checkbox" name="remeber" id="remember_me" name="remember">
											<span class="checkmark"></span>
										</label>
									</div>
                                    <button class="btn btn-outline-light w-100 btn-size" type="submit">{{ __('Sign in') }}</button>
									<div class="text-center dont-have">Don't have an account ? <a href="{{route('register')}}">Sign Up</a>
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
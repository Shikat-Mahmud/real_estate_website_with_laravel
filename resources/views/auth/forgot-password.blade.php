<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Forgot Password</title>
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
                <a href="{{ route('home') }}"><img class="img-fluid logo-dark" src="{{asset('storage/'.$setting->logo) }}" style="width: auto !important; height: 70px !important; padding: 5px !important; margin-top: 10px !important;" alt="Logo"></a>
            </header>
            <!-- /Header -->

            <div class="login-wrapper" style="height: calc(80vh - 80px) !important;">
                <div class="loginbox">
                    <div class="login-auth">
                        <div class="login-auth-wrap">
                            <div class="sign-group">
                                <a href="{{ route('home') }}" class="btn sign-up"><span><i class="fe feather-corner-down-left" aria-hidden="true"></i></span> Back To Home</a>
                            </div>
                            <h1>Forgot Password</h1>

                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form class="row g-3 needs-validation" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="mb-4 text-sm text-gray-600">
                                    <p style="font-weight:800;">Forgot your password?</p>
                                </div>
                                <div class="form-group">
                                    <label  for="email" :value="__('Email')"  class="form-label">Email <span>*</span></label>
                                    <input id="email"  type="email" name="email" :value="old('email')" required autofocus class="form-control" placeholder="Enter Email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <button type="submit" class="btn btn-outline-light w-100 btn-size">{{ __('Email Password Reset Link') }}</button>
                                <div class="text-center dont-have">Remember login ? <a href="{{ route('login') }}">Sign In</a>
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
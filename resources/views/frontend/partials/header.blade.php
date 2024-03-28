<header class="header header-fix">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="{{ route('home') }}" class="navbar-brand logo">
                @if($setting->logo)
                <img src="{{ asset('storage/'.$setting->logo) }}" style="width: auto !important; height: 60px !important; padding: 5px !important;" class="img-fluid" alt="Logo">
                @endif
            </a>

        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{ route('home') }}" class="menu-logo">
                    @if($setting->logo)
                    <img src="{{asset('storage/'.$setting->logo) }}" style="width: auto; height: 70px"
                        class="img-fluid" alt="Logo">
                    @endif
                </a>

                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="{{ route('home') }}">Home</a>
                </li>

                <!-- <li class="has-submenu">
                    <a href="javascript:void(0);">Blog <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="blog-list.html">Blog List</a></li>
                        <li><a href="blog-grid.html">Blog Grid</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>	
                    </ul>
                </li> -->

                <li><a href="{{ route('about') }}">About Us</a></li>

                <li><a href="{{ route('contact') }}">Contact Us</a></li>

                @if(!Auth::check())
                <li class="login-link"><a href="{{ route('login') }}">Sign Up</a></li>
                <li class="login-link"><a href="{{ route('login') }}">Sign In</a></li>
                @else

                <li class="has-submenu d-block d-sm-none">
                    <a href="javascript:void(0);">{{ auth()->user()->name }} <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ route('profile.edit') }}">{{ auth()->user()->name }}</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            @if(!Auth::check())
            <li>
                <a href="{{ route('register') }}" class="btn btn-primary"><i class="feather-user-plus"></i>Sign Up</a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="btn sign-btn"><i class="feather-unlock"></i>Sign In</a>
            </li>
            @else
            @if(auth()->user()->role == 'admin')
            <a href="{{ route('admin-dashboard') }}" class="btn sign-btn">
                @if(isset(auth()->user()->photo))
                <img src="{{ asset('storage/' . auth()->user()->photo) }}" class="avatar" style="margin: 2px; padding: 1px; border: 2px solid #6C60FE">
                @else
                <img src="{{asset('assets/img/avatar_img.png')}}" class="avatar" style="margin: 2px; padding: 1px; border: 2px solid #6C60FE">
                @endif
                {{ auth()->user()->name }} 
            </a>
            @else
            <a href="{{ route('user-dashboard') }}" class="btn sign-btn">
                @if(isset(auth()->user()->photo))
                <img src="{{ asset('storage/' . auth()->user()->photo) }}" class="avatar" style="margin: 2px; padding: 1px; border: 2px solid #6C60FE">
                @else
                <img src="{{asset('assets/img/avatar_img.png')}}" class="avatar" style="margin: 2px; padding: 1px; border: 2px solid #6C60FE">
                @endif                
                {{ auth()->user()->name }} 
            </a>
            @endif
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn sign-btn"><i class="feather-lock"></i> Logout</button>
            </form>

            @endif
        </ul>
    </nav>
</header>
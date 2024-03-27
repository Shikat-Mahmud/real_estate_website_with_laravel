<style>
    .avatar-img {
        height: 30px; width: 30px; border-radius: 50%; margin: 2px; padding: 1px; border: 2px solid #ffffff; 
    }
</style>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

    <!-- Left Side (Brand and Sidebar Toggle) -->
    <div class="d-flex align-items-center">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('home') }}">{{ gs()->business_name ?? '' }}</a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Right Side (Dropdown) -->
    <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                @if(auth()->user()->photo)
                <img src="{{ asset('storage/' . auth()->user()->photo) }}"  class="avatar-img">
                @else
                <img src="https://lh3.googleusercontent.com/proxy/FMdpK8RXpwmgJy-GPX7yJDHMvu_RvWqWRVf0xBdmeROkG-6z90M9XJm5RQFdglx47XvWsCzo5w" class="avatar-img">
                @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('setting') }}">Settings</a></li>
                <li><a class="dropdown-item" href="{{ route('admin-edit') }}">Profile Update</a></li>
                <li><a class="dropdown-item" href="{{ route('change-password') }}">Change Password </a></li>

                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
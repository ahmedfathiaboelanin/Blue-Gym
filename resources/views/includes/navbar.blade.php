<div class="nav">
    <div class="container nav-container">
        <div class="logo m-0 p-0">
            Blue Gym
        </div>
        <ul class="d-md-flex d-none m-0 p-0">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('packages') }}">Packages</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
            @endguest
            @auth
                <li><a href="{{ route('profile') }}">Profile</a></li>
            @endauth
            @auth
                @if (auth()->user()->role !== 'user')
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @endif
            @endauth
            @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
        <div id="toggle" class="toggle d-block d-md-none">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
</div>
<div id="sidebar" class="side-nav d-flex d-md-none">
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
        @endguest
        @auth
            <li><a href="{{ route('profile') }}">Profile</a></li>
        @endauth
        @auth
            @if (auth()->user()->role !== 'user')
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @endif
        @endauth
        @auth
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        @endauth
    </ul>
</div>
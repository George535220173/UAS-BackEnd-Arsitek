<!-- _header.blade.php -->
<header>
    <nav class="navbar">
        <div class="left-nav">
            <div id="hamburger-menu" class="hamburger-menu">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <div class="logo">
                <a href="{{ url('/') }}" class="logo-area">GP.</a>
            </div>
        </div>

        @guest
            <a href="{{ route('login') }}" class="cta"><button>Login</button></a>
        @else
            <a href="{{ url('/#contact') }}" class="cta"><button id="getStartedButton">Get Started</button></a>
        @endguest
    </nav>
</header>

<!-- Overlay and Sidebar Menu -->
<div id="overlay" class="overlay"></div>
<div id="sidebar-menu" class="sidebar-menu">
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="#team-section" id="sidebar-about-link">About</a></li>
        <li class="has-submenu">
            <a href="{{ url('/projects') }}">Projects</a>
            <ul class="submenu">
                <li><a href="{{ url('/projects/exterior') }}">Exterior</a></li>
                <li><a href="{{ url('/projects/interior') }}">Interior</a></li>
            </ul>
        </li>
        @auth
            <li><a href="{{ url('/favorites') }}">Favorites</a></li>
            <li><a href="{{ route('profile') }}">Profile</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">Logout</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endguest
    </ul>
</div>

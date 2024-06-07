<!-- Header -->
<header>
    <nav class="navbar">
        <div id="hamburger-menu" class="hamburger-menu">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <div class="logo">
            <a href="{{ url('/') }}" class="logo-area">GP.</a>
        </div>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/services') }}">Services</a></li>
            <li><a href="{{ url('/portofolio') }}">Portfolio</a></li>
            <li><a href="{{ url('/team') }}">Team</a></li>
            <li class="dropdown">
                <a href="#">Dropdown <span>&#9662;</span></a>
                <ul class="dropdown-content">
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                </ul>
            </li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
        <a href="#contact" class="cta"><button>Get Started</button></a>
    </nav>
</header>

<!-- Overlay and Sidebar Menu -->
<div id="overlay" class="overlay"></div>
<div id="sidebar-menu" class="sidebar-menu">
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/about') }}">About</a></li>
        <li><a href="{{ url('/services') }}">Services</a></li>
        <li><a href="{{ url('/portfolio') }}">Portfolio</a></li>
        <li><a href="{{ url('/team') }}">Team</a></li>
        <li><a href="{{ url('/contact') }}">Contact</a></li>
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            <li><a href="{{ route('profile') }}">Profile</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">Logout</button>
                </form>
            </li>
        @endguest
    </ul>
</div>

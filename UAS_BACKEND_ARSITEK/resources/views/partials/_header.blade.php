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
            <li><a href="#team-section" id="header-about-link">About</a></li>
            <li><a href="{{ url('/service') }}">Services</a></li>
            <li><a href="{{ url('/projects') }}">Projects</a></li>
        </ul>

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
        <li><a href="{{ url('/service') }}">Services</a></li>
        <li><a href="{{ url('/projects') }}">Portfolio</a></li>
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

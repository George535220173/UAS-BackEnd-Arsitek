<header>
    <nav class="navbar">
        <div class="left-nav">
            <div id="hamburger-menu" class="hamburger-menu">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('img/MRS1.png') }}" width="70px" height="70px"></a>
            </div>
        </div>

        @guest
            <a href="{{ route('login') }}" class="cta"><button>Login</button></a>
        @else
            <a href="{{ url('/#contact') }}" class="cta"><button id="getStartedButton">Get Started</button></a>
        @endguest
    </nav>
</header>

<!-- Overlay -->
<div id="overlay" class="overlay"></div>

<!-- Main Sidebar Menu -->
<div id="sidebar-menu" class="sidebar-menu">
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/team') }}">MRS Team</a></li>
        <li class="projects-menu">
            <a href="#" id="projectsButton">Projects</a>
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

<!-- Secondary Sidebar Menu -->
<div id="projects-submenu" class="projects-submenu">
    <ul>
        <li><a href="{{ url('/projects/architecture') }}">Architecture</a></li>
        <li><a href="{{ url('/projects/interiordesign') }}">Interior Design</a></li>
    </ul>
</div>

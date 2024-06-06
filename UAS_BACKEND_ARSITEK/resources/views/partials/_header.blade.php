<!-- Header -->
<header>
    <nav class="navbar">
        <div class="logo">
            <span>GP.</span>
        </div>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/services') }}">Services</a></li>
            <li><a href="{{ url('/portfolio') }}">Portfolio</a></li>
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
        <a href="#" class="cta"><button>Get Started</button></a>
    </nav>
</header>
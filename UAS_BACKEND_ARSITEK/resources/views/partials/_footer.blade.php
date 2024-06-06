<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h2>GP</h2>
            <p>A108 Adam Street<br>New York, NY 535022</p>
            <p>Phone: +1 5589 55488 55<br>Email: info@example.com</p>
            <div class="socials">
                <a href="#" class="social-box"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-box"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-box"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-box"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="footer-section">
            <h2>Useful Links</h2>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About us</a></li>
                <li><a href="{{ url('/services') }}">Services</a></li>
                <li><a href="{{ url('/terms') }}">Terms of service</a></li>
                <li><a href="{{ url('/privacy') }}">Privacy policy</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h2>Our Services</h2>
            <ul>
                <li><a href="{{ url('/services/web-design') }}">Web Design</a></li>
                <li><a href="{{ url('/services/web-development') }}">Web Development</a></li>
                <li><a href="{{ url('/services/product-management') }}">Product Management</a></li>
                <li><a href="{{ url('/services/marketing') }}">Marketing</a></li>
                <li><a href="{{ url('/services/graphic-design') }}">Graphic Design</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h2>Our Newsletter</h2>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form class="newsletter">
                <input type="email" placeholder="Enter your email address">
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; Copyright GP. All Rights Reserved</p>
        <p>Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a></p>
    </div>
</footer>

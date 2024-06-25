$(document).ready(function () {
    $('.index-carousel-container').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const getStartedButton = document.getElementById('getStartedButton');

    if (getStartedButton) {
        getStartedButton.addEventListener('click', function (event) {
            event.preventDefault();

            if (window.location.pathname === '/') {
                document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
            } else {
                window.location.href = '/#contact';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const aboutLinks = document.querySelectorAll('#header-about-link, #sidebar-about-link');

    aboutLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('#team-section').scrollIntoView({
                behavior: 'smooth'
            });

            // If the sidebar is open, close it
            document.getElementById('sidebar-menu').classList.remove('open');
            document.getElementById('overlay').classList.remove('open');
        });
    });
});

// Scrolling to section
document.addEventListener('DOMContentLoaded', function () {
    // Mendengarkan klik pada semua tautan jangkar
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});

function openFullscreen(src) {
    document.getElementById('fullscreen-overlay').style.display = 'flex';
    document.getElementById('fullscreen-image').src = src;
}

function closeFullscreen() {
    document.getElementById('fullscreen-overlay').style.display = 'none';
    document.getElementById('fullscreen-image').src = '';
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('fullscreen-overlay').addEventListener('click', function (e) {
        if (e.target === this) {
            closeFullscreen();
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-slide');
    let currentSlide = 0;

    function showNextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        slides.forEach((slide, index) => {
            slide.style.transform = `translateX(-${currentSlide * 100}%)`;
        });
    }

    setInterval(showNextSlide, 4000); // Change slide every 4 seconds
});
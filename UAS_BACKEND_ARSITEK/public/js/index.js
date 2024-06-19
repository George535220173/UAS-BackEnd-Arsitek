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

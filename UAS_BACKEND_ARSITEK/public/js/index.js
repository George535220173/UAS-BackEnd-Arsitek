$(document).ready(function () {
    $('.carousel-container').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false
    });
});

// public/js/scripts.js
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.cta').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('#contact').scrollIntoView({
            behavior: 'smooth'
        });
    });
});

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

$(document).ready(function(){
    $('#portfolioCarousel').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
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
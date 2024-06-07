        // Carousel functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-image img');
        const dots = document.querySelectorAll('.carousel-indicators .dot');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.display = (i === index) ? 'block' : 'none';
                dots[i].style.backgroundColor = (i === index) ? '#ffc800' : '#bbb';
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });

        // Initialize the carousel
        showSlide(currentSlide);

        // Auto-rotate the carousel every 5 seconds
        setInterval(nextSlide, 5000);

/*Hamburger animation*/
document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.getElementById('hamburger-menu');
    const sidebarMenu = document.getElementById('sidebar-menu');
    const overlay = document.getElementById('overlay');

    hamburger.addEventListener('click', function () {
        hamburger.classList.toggle('active');
        sidebarMenu.classList.toggle('active');
        overlay.classList.toggle('active');
        document.body.classList.toggle('no-scroll');
    });

    overlay.addEventListener('click', function () {
        hamburger.classList.remove('active');
        sidebarMenu.classList.remove('active');
        overlay.classList.remove('active');
        document.body.classList.remove('no-scroll');
    });
});


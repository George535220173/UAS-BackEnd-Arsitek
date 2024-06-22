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
        closeSidebar();
    });

    document.querySelectorAll('a[href="#team-section"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            closeSidebar();
            document.querySelector('#team-section').scrollIntoView({ behavior: 'smooth' });
        });
    });

    function closeSidebar() {
        hamburger.classList.remove('active');
        sidebarMenu.classList.remove('active');
        overlay.classList.remove('active');
        document.body.classList.remove('no-scroll');
    }
});


document.addEventListener("DOMContentLoaded", function() {
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const sidebarMenu = document.querySelector('#sidebar-menu');
    const projectsSubmenu = document.querySelector('#projects-submenu');
    const overlay = document.querySelector('#overlay');

    hamburgerMenu.addEventListener('click', function() {
        this.classList.toggle('active');
        sidebarMenu.classList.toggle('active');
        overlay.classList.toggle('active');
        document.body.classList.toggle('no-scroll');
    });

    overlay.addEventListener('click', function() {
        hamburgerMenu.classList.remove('active');
        sidebarMenu.classList.remove('active');
        projectsSubmenu.classList.remove('show');
        this.classList.remove('active');
        document.body.classList.remove('no-scroll');
    });

    const projectsMenu = document.querySelector('.projects-menu');
    projectsMenu.addEventListener('mouseenter', function() {
        projectsSubmenu.style.left = sidebarMenu.getBoundingClientRect().right + 'px';
        projectsSubmenu.classList.add('show');
    });

    projectsMenu.addEventListener('mouseleave', function() {
        projectsSubmenu.classList.remove('show');
    });

    projectsSubmenu.addEventListener('mouseenter', function() {
        this.classList.add('show');
    });

    projectsSubmenu.addEventListener('mouseleave', function() {
        this.classList.remove('show');
    });
});

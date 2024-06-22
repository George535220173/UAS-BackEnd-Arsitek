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
        projectsSubmenu.classList.remove('active');
        this.classList.remove('active');
        document.body.classList.remove('no-scroll');
    });

    const projectsMenu = document.querySelector('.projects-menu');
    projectsMenu.addEventListener('mouseenter', function() {
        projectsSubmenu.style.left = sidebarMenu.getBoundingClientRect().right + 'px';
        projectsSubmenu.style.display = 'block';
    });

    projectsMenu.addEventListener('mouseleave', function() {
        projectsSubmenu.style.display = 'none';
    });

    projectsSubmenu.addEventListener('mouseenter', function() {
        this.style.display = 'block';
    });

    projectsSubmenu.addEventListener('mouseleave', function() {
        this.style.display = 'none';
    });
});

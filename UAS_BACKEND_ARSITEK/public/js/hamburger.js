document.addEventListener("DOMContentLoaded", function() {
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const sidebarMenu = document.querySelector('#sidebar-menu');
    const projectsSubmenu = document.querySelector('#projects-submenu');
    const overlay = document.querySelector('#overlay');
    const projectsMenuItem = document.querySelector('.projects-menu');

    hamburgerMenu.addEventListener('click', function() {
        this.classList.toggle('active');
        sidebarMenu.classList.toggle('active');
        overlay.classList.toggle('active');
        document.body.classList.toggle('no-scroll'); // Prevent scrolling
    });

    overlay.addEventListener('click', function() {
        hamburgerMenu.classList.remove('active');
        sidebarMenu.classList.remove('active');
        projectsSubmenu.classList.remove('show');
        this.classList.remove('active');
        document.body.classList.remove('no-scroll'); // Enable scrolling
    });

    projectsMenuItem.addEventListener('mouseenter', function() {
        const projectsMenuTop = projectsMenuItem.getBoundingClientRect().top;
        projectsSubmenu.style.top = `${projectsMenuTop}px`;
        projectsSubmenu.style.left = sidebarMenu.getBoundingClientRect().right + 'px';
        projectsSubmenu.classList.add('show');
    });

    projectsMenuItem.addEventListener('mouseleave', function() {
        projectsSubmenu.classList.remove('show');
    });

    projectsSubmenu.addEventListener('mouseenter', function() {
        this.classList.add('show');
    });

    projectsSubmenu.addEventListener('mouseleave', function() {
        this.classList.remove('show');
    });
});

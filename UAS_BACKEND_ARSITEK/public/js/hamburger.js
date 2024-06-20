document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.getElementById('hamburger-menu');
    const sidebarMenu = document.getElementById('sidebar-menu');
    const overlay = document.getElementById('overlay');
    const submenuLinks = document.querySelectorAll('.has-submenu > a');
    const submenus = document.querySelectorAll('.submenu');

    hamburger.addEventListener('click', function () {
        hamburger.classList.toggle('active');
        sidebarMenu.classList.toggle('active');
        overlay.classList.toggle('active');
        document.body.classList.toggle('no-scroll');

        if (!sidebarMenu.classList.contains('active')) {
            closeSubmenus();
        }
    });

    overlay.addEventListener('click', function () {
        closeSidebar();
        closeSubmenus();
    });

    submenuLinks.forEach(link => {
        link.addEventListener('mouseenter', function () {
            const submenu = this.nextElementSibling;
            closeSubmenus();
            submenu.style.display = 'block';
            submenu.style.opacity = '1';
        });

        link.addEventListener('mouseleave', function () {
            const submenu = this.nextElementSibling;
            submenu.style.display = 'none';
            submenu.style.opacity = '0';
        });

        const submenu = link.nextElementSibling;
        submenu.addEventListener('mouseenter', function () {
            submenu.style.display = 'block';
            submenu.style.opacity = '1';
        });

        submenu.addEventListener('mouseleave', function () {
            submenu.style.display = 'none';
            submenu.style.opacity = '0';
        });
    });

    function closeSidebar() {
        hamburger.classList.remove('active');
        sidebarMenu.classList.remove('active');
        overlay.classList.remove('active');
        document.body.classList.remove('no-scroll');
    }

    function closeSubmenus() {
        submenus.forEach(submenu => {
            submenu.style.display = 'none';
            submenu.style.opacity = '0';
        });
    }
});

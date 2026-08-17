document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('admin-sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const menuButton = document.getElementById('menu-button');
    const closeButton = document.getElementById('sidebar-close');

    const setSidebar = (open) => {
        sidebar.classList.toggle('open', open);
        overlay.classList.toggle('show', open);
        document.body.classList.toggle('nav-open', open);
    };

    menuButton.addEventListener('click', () => setSidebar(true));
    closeButton.addEventListener('click', () => setSidebar(false));
    overlay.addEventListener('click', () => setSidebar(false));

    window.addEventListener('resize', () => {
        if (window.innerWidth > 991) setSidebar(false);
    });
});

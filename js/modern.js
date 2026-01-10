document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menuToggle');
    const navbar = document.getElementById('nvg');

    if (menuToggle && navbar) {
        menuToggle.addEventListener('click', () => {
            navbar.classList.toggle('mobile-active');
            const icon = menuToggle.querySelector('i');
            if (navbar.classList.contains('mobile-active')) {
                icon.className = 'fa fa-times';
                navbar.style.display = 'flex';
                navbar.style.flexDirection = 'column';
                navbar.querySelector('.nav-container').style.display = 'flex';
                navbar.querySelector('.nav-container').style.flexDirection = 'column';
                navbar.querySelector('.nav-container').style.width = '100%';
            } else {
                icon.className = 'fa fa-bars';
                navbar.style.display = '';
                navbar.querySelector('.nav-container').style.display = '';
            }
        });
    }

    // Lazy load images
    const images = document.querySelectorAll('img');
    images.forEach(img => {
        if (!img.getAttribute('loading')) {
            img.setAttribute('loading', 'lazy');
        }
    });
});

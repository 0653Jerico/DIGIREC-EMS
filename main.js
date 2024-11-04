document.getElementById('burger-menu').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    const topNavbar = document.querySelector('.top-navbar');
    sidebar.classList.toggle('hidden');
    topNavbar.style.left = sidebar.classList.contains('hidden') ? '0' : '250px';
});

document.getElementById('top-profile').addEventListener('click', function() {
    this.classList.toggle('active');
});
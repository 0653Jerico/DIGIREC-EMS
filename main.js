// main.js
document.addEventListener('DOMContentLoaded', function() {
    const burgerToggle = document.getElementById('burger-toggle');
    const closeAside = document.getElementById('close-aside');
    const aside = document.querySelector('aside');

    burgerToggle.addEventListener('click', function() {
        aside.classList.toggle('open');
    });

    closeAside.addEventListener('click', function() {
        aside.classList.remove('open');
    });
});
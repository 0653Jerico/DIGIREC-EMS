// main.js
document.addEventListener('DOMContentLoaded', function () {
    const burgerToggle = document.getElementById('burger-toggle');
    const closeAside = document.getElementById('close-aside');
    const aside = document.querySelector('aside');

    burgerToggle.addEventListener('click', function () {
        aside.classList.toggle('open');
    });

    closeAside.addEventListener('click', function () {
        aside.classList.remove('open');
    });
});

// Background hover effect at sidebar
document.addEventListener('DOMContentLoaded', function () {
    const options = document.querySelectorAll('.side-option li');

    options.forEach(option => {
        option.addEventListener('click', function () {
            // Remove 'selected' class from all options
            options.forEach(opt => opt.classList.remove('selected'));

            // Add 'selected' class to the clicked option
            this.classList.add('selected');
        });
    });
});

// SideBar Options
document.addEventListener('DOMContentLoaded', function () {
    const options = document.querySelectorAll('.side-option li');
    const mainContent = document.querySelector('main');

    options.forEach(option => {
        option.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default link behavior

            // Remove 'selected' class from all options
            options.forEach(opt => opt.classList.remove('selected'));

            // Add 'selected' class to the clicked option
            this.classList.add('selected');

            // Determine which content to load based on the clicked option
            let url = '';
            if (this.dataset.option === 'dashboard') {
                url = 'dashboard.php';
            } else if (this.dataset.option === 'add-patient') {
                url = 'addPatient.php';
            } else if (this.dataset.option === 'existing-patient') {
                url = 'existingPatient.php';
            } else if (this.dataset.option === 'manage-records') {
                url = 'manageRecords.php'
            } else if (this.dataset.option === 'settings') {
                url = 'settings.php'
            } 
                
            // Fetch content from the appropriate PHP file
            if (url) {
                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        // Load the fetched content into the <main> section
                        mainContent.innerHTML = data;
                    })
                    .catch(error => console.error('Error loading content:', error));
            }
        });
    });
});
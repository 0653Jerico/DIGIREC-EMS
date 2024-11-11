// main.js
document.addEventListener('DOMContentLoaded', function () {
    const burgerToggle = document.getElementById('burger-toggle');
    const closeAside = document.getElementById('close-aside');
    const aside = document.querySelector('aside');
    const options = document.querySelectorAll('.side-option li');
    const mainContent = document.querySelector('main');

    burgerToggle.addEventListener('click', function () {
        aside.classList.toggle('open');
    });

    closeAside.addEventListener('click', function () {
        aside.classList.remove('open');
    });

    options.forEach(option => {
        option.addEventListener('click', function (event) {
            event.preventDefault();

            options.forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');

            let url = '';
            switch (this.dataset.option) {
                case 'dashboard':
                    url = 'dashboard.php';
                    break;
                case 'add-patient':
                    url = 'addPatient.php';
                    break;
                case 'existing-patient':
                    url = 'existingPatient.php';
                    break;
                case 'manage-records':
                    url = 'manageRecords.php';
                    break;
                case 'settings':
                    url = 'settings.php';
                    break;
            }

            if (url) {
                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(data => {
                        mainContent.innerHTML = data;
                    })
                    .catch(error => console.error('Error loading content:', error));
            }
        });
    });
});
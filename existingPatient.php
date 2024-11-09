<?php
require_once 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .existing-patient {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .existing-patient h3 {
            color: #333;
        }
        .existing-patient form {
            margin-bottom: 20px;
        }
        .existing-patient input[type="text"], .existing-patient textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        .existing-patient button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        .existing-patient button:hover {
            background-color: #0056b3;
        }
        .existing-patient .patient-list {
            list-style-type: none;
            padding: 0;
        }
        .existing-patient .patient-list li {
            padding: 5px;
            border-bottom: 1px solid #ccc;
            cursor: pointer;
        }
        .existing-patient .no-results, .existing-patient .error, .existing-patient .success {
            color: red;
        }
        .existing-patient .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="existing-patient">
        <h3>Existing Patient Search</h3>

        <!-- Search Form -->
        <form id="search-form">
            <input type="text" name="searchTerm" placeholder="Search for a patient" required>
            <button type="submit">Search</button>
        </form>

        <!-- Display Search Results -->
        <div id="search-results"></div>

        <!-- Patient Details and Update Form -->
        <div id="patient-details"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchForm = document.getElementById('search-form');
            const searchResults = document.getElementById('search-results');
            const patientDetails = document.getElementById('patient-details');

            searchForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent form from submitting normally

                const formData = new FormData(searchForm);
                formData.append('ajaxSearch', true);

                // Perform AJAX request to search for patients
                fetch('includes/searchExisting.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    searchResults.innerHTML = data;
                })
                .catch(error => console.error('Error performing search:', error));
            });

            searchResults.addEventListener('click', function (event) {
                if (event.target.tagName === 'LI') {
                    const patientId = event.target.getAttribute('data-id');

                    // Fetch patient details using AJAX
                    fetch(`includes/getPatientDetails.php?id=${patientId}`)
                        .then(response => response.text())
                        .then(data => {
                            patientDetails.innerHTML = data;
                        })
                        .catch(error => console.error('Error fetching patient details:', error));
                }
            });
        });
    </script>
</body>
</html>
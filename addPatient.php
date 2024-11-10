<?php
// addPatient.php
require_once 'includes/db.php';
// Do not include storePatient.php here, as it should be called via AJAX
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/addPatient.css">
    <title>Add Patient</title>
</head>

<body>
    <div class="main-content">
        <div class="add-patient-form">
            <h2>Personal Information</h2>
            <form id="add-patient-form" method="post">
                <!-- Form fields here -->
                <div>
                    <label for="patient-name">Patient Name:</label>
                    <input id="patient-name" type="text" name="patient-name" required>
                </div>

                <div>
                    <label for="contact">Contact No:</label>
                    <input id="contact" type="tel" name="contact" required>
                </div>

                <div>
                    <label for="mother-name">Mother's Name:</label>
                    <input id="mother-name" type="text" name="mother-name" required>
                </div>

                <div>
                    <label for="father-name">Father's Name:</label>
                    <input id="father-name" type="text" name="father-name" required>
                </div>

                <div>
                    <label for="birthday">Birthdate:</label>
                    <input id="birthday" type="date" name="birthday" required>
                </div>

                <div>
                    <label for="address">Address:</label>
                    <input id="address" type="text" name="address" required>
                </div>

                <div>
                    <label>Gender:</label>
                    <div class="gender-group">
                        <input name="gender" id="gender-male" type="radio" value="male" required>
                        <label for="gender-male">Male</label>
                        <input name="gender" id="gender-female" type="radio" value="female" required>
                        <label for="gender-female">Female</label>
                    </div>
                </div>

                <div>
                    <label for="age">Age:</label>
                    <input id="age" type="text" name="age">
                </div>

                <h2>Birth History</h2>

                <div>
                    <label for="term">Term:</label>
                    <input id="term" type="text" name="term">
                </div>

                <div>
                    <label for="delivery">Delivery:</label>
                    <input id="delivery" type="text" name="delivery">
                </div>

                <div>
                    <label for="birthplace">Birthplace:</label>
                    <input id="birthplace" type="text" name="birthplace">
                </div>

                <div>
                    <label for="birth-weight">Birth Weight (in kls):</label>
                    <input id="birth-weight" type="text" name="birth-weight">
                </div>

                <div>
                    <label for="birth-length">Birth Length (in cm):</label>
                    <input id="birth-length" type="text" name="birth-length">
                </div>

                <div>
                    <label for="head-circ">Head Circ (in cm):</label>
                    <input id="head-circ" type="text" name="head-circ">
                </div>

                <div>
                    <label for="chest-circ">Chest Circ (in cm):</label>
                    <input id="chest-circ" type="text" name="chest-circ">
                </div>

                <div>
                    <label for="abdominal-circ">Abdominal Circ (in cm):</label>
                    <input id="abdominal-circ" type="text" name="abdominal-circ">
                </div>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("add-patient-form");
        form.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission

            const formData = new FormData(form);

            fetch("storePatient.php", {
                method: "POST",
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                alert(data.message); // Display the popup with the response message

                if (data.status === "success") {
                    form.reset(); // Optionally reset the form
                    window.location.href = "addPatient.php"; // Reload the page
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("An error occurred while submitting the form.");
            });
        });
    });
</script>
</body>

</html>
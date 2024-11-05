<?php
// addPatient.php

// Simulate some content for the "Add Patient" page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <style>
        /* Add some basic styling for testing */
        .add-patient-form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .add-patient-form h2 {
            text-align: center;
        }
        .add-patient-form label {
            display: block;
            margin-bottom: 5px;
        }
        .add-patient-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .add-patient-form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .add-patient-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="add-patient-form">
        <h2>Add Patient</h2>
        <form action="#" method="post">
            <label for="patient-name">Patient Name:</label>
            <input type="text" id="patient-name" name="patient-name" required>

            <label for="patient-age">Patient Age:</label>
            <input type="number" id="patient-age" name="patient-age" required>

            <label for="patient-gender">Patient Gender:</label>
            <select id="patient-gender" name="patient-gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
<?php
// addPatient.php

// Simulate some content for the "Add Patient" page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/addPatient.css">
    <title>Add Patient</title>
    <style>
        .main-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
            width: 100%;
            height: 100%;
        }

        .add-patient-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px; /* Adjust as needed */
            box-sizing: border-box;
            margin: 0 auto;
        }

        .add-patient-form h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .add-patient-form form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .add-patient-form label {
            margin-top: 10px;
            color: #555;
        }

        .add-patient-form .gender-group {
            display: flex;
            align-items: center;
            margin-top: 5px;
        }

        .add-patient-form input[type="text"],
        .add-patient-form input[type="date"],
        .add-patient-form input[type="tel"] {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .add-patient-form input[type="radio"] {
            margin-right: 5px;
        }

        .add-patient-form .full-width {
            grid-column: span 2;
        }

        .add-patient-form button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            grid-column: span 2;
            justify-self: center;
            width: 150px; /* Smaller width for the button */
        }

        .add-patient-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="main-content">
        <div class="add-patient-form">
            <h2>Add Patient</h2>
            <form action="#" method="post">
                <div>
                    <label for="patient-name">Patient Name:</label>
                    <input id="patient-name" type="text" name="patient-name" required>
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
                    <label for="contact">Contact No:</label>
                    <input id="contact" type="tel" name="contact" required>
                </div>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
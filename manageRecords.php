<?php
// manageRecords.php

// Simulate some content for the "Manage Records" page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Records</title>
    <style>
        /* Add some basic styling for testing */
        .manage-records {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .manage-records h2 {
            text-align: center;
        }
        .record-list {
            list-style-type: none;
            padding: 0;
        }
        .record-list li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .record-list li:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="manage-records">
        <h2>Manage Records</h2>
        <ul class="record-list">
            <li>Record 1: Patient A</li>
            <li>Record 2: Patient B</li>
            <li>Record 3: Patient C</li>
            <!-- Add more records as needed -->
        </ul>
    </div>
</body>
</html>
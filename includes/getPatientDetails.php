<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $patientId = intval($_GET['id']);
    $stmt = $pdo->prepare("SELECT * FROM patient_info WHERE id = :id;");
    $stmt->bindParam(':id', $patientId, PDO::PARAM_INT);
    $stmt->execute();
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($patient) {
        echo "<h4>Patient Details</h4>";
        echo "<p>Name: " . htmlspecialchars($patient['name'], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>Contact: " . htmlspecialchars($patient['contact'], ENT_QUOTES, 'UTF-8') . "</p>";
        // Add more patient details as needed

        echo "<h4>Add Signs and Symptoms</h4>";
        echo "<form method='post' action='includes/updatePatient.php'>";
        echo "<input type='hidden' name='patientId' value='" . htmlspecialchars($patient['id'], ENT_QUOTES, 'UTF-8') . "'>";
        echo "<textarea name='signsSymptoms' placeholder='Add signs and symptoms' required></textarea>";
        echo "<button type='submit' name='update'>Update</button>";
        echo "</form>";
    } else {
        echo "<p class='error'>Patient not found.</p>";
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
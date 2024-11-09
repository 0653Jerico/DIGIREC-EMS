<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $patientId = intval($_POST['id']);
    $signsSymptoms = htmlspecialchars($_POST['signsSymptoms'], ENT_QUOTES, 'UTF-8');

    try {
        $stmt = $pdo->prepare("UPDATE patient_info SET signs_symptoms = :signsSymptoms WHERE id = :patientId;");
        $stmt->bindParam(':signsSymptoms', $signsSymptoms, PDO::PARAM_STR);
        $stmt->bindParam(':patientId', $patientId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<p class='success'>Record updated successfully.</p>";
        } else {
            echo "<p class='error'>Error updating record. Please try again later.</p>";
        }
    } catch (PDOException $e) {
        error_log("Error updating record: " . $e->getMessage());
        echo "<p class='error'>An error occurred while updating. Please try again later.</p>";
    }
}
?>
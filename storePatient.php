<?php
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $patientName = htmlspecialchars(trim($_POST['patient-name']), ENT_QUOTES, 'UTF-8');
    $contact = htmlspecialchars(trim($_POST['contact']), ENT_QUOTES, 'UTF-8');
    $motherName = htmlspecialchars(trim($_POST['mother-name']), ENT_QUOTES, 'UTF-8');
    $fatherName = htmlspecialchars(trim($_POST['father-name']), ENT_QUOTES, 'UTF-8');
    $birthday = htmlspecialchars(trim($_POST['birthday']), ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');
    $gender = htmlspecialchars(trim($_POST['gender']), ENT_QUOTES, 'UTF-8');
    $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
    $term = htmlspecialchars(trim($_POST['term']), ENT_QUOTES, 'UTF-8');
    $delivery = htmlspecialchars(trim($_POST['delivery']), ENT_QUOTES, 'UTF-8');
    $birthplace = htmlspecialchars(trim($_POST['birthplace']), ENT_QUOTES, 'UTF-8');
    $birthWeight = htmlspecialchars(trim($_POST['birth-weight']), ENT_QUOTES, 'UTF-8');
    $birthLength = htmlspecialchars(trim($_POST['birth-length']), ENT_QUOTES, 'UTF-8');
    $headCirc = htmlspecialchars(trim($_POST['head-circ']), ENT_QUOTES, 'UTF-8');
    $chestCirc = htmlspecialchars(trim($_POST['chest-circ']), ENT_QUOTES, 'UTF-8');
    $abdominalCirc = htmlspecialchars(trim($_POST['abdominal-circ']), ENT_QUOTES, 'UTF-8');

    try {
        // Prepare an SQL statement for execution
        $stmt = $pdo->prepare("INSERT INTO patient_info (name, contact, mother_name, father_name, birthdate, address, gender, age, term, delivery, birthplace, weight_kls, length_cm, head_circ_cm, chest_circ_cm, abdominal_circ_cm) VALUES (:patientName, :contact, :motherName, :fatherName, :birthday, :address, :gender, :age, :term, :delivery, :birthplace, :birthWeight, :birthLength, :headCirc, :chestCirc, :abdominalCirc)");

        // Bind parameters to statement variables
        $stmt->bindParam(':patientName', $patientName);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':motherName', $motherName);
        $stmt->bindParam(':fatherName', $fatherName);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':delivery', $delivery);
        $stmt->bindParam(':birthplace', $birthplace);
        $stmt->bindParam(':birthWeight', $birthWeight);
        $stmt->bindParam(':birthLength', $birthLength);
        $stmt->bindParam(':headCirc', $headCirc);
        $stmt->bindParam(':chestCirc', $chestCirc);
        $stmt->bindParam(':abdominalCirc', $abdominalCirc);

        // Execute the prepared statement
        $stmt->execute();

        echo "Patient information added successfully.";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
<?php
// storePatient.php

header('Content-Type: application/json');

$response = array();

try {
    // Code to process and store patient data in the database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize form inputs
        $patientName = htmlspecialchars($_POST['patient-name'], ENT_QUOTES, 'UTF-8');
        $contact = htmlspecialchars($_POST['contact'], ENT_QUOTES, 'UTF-8');
        $motherName = htmlspecialchars($_POST['mother-name'], ENT_QUOTES, 'UTF-8');
        $fatherName = htmlspecialchars($_POST['father-name'], ENT_QUOTES, 'UTF-8');
        $birthday = htmlspecialchars($_POST['birthday'], ENT_QUOTES, 'UTF-8');
        $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
        $gender = htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF-8');
        $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
        $term = htmlspecialchars($_POST['term'], ENT_QUOTES, 'UTF-8');
        $delivery = htmlspecialchars($_POST['delivery'], ENT_QUOTES, 'UTF-8');
        $birthplace = htmlspecialchars($_POST['birthplace'], ENT_QUOTES, 'UTF-8');
        $birthWeight = htmlspecialchars($_POST['birth-weight'], ENT_QUOTES, 'UTF-8');
        $birthLength = htmlspecialchars($_POST['birth-length'], ENT_QUOTES, 'UTF-8');
        $headCirc = htmlspecialchars($_POST['head-circ'], ENT_QUOTES, 'UTF-8');
        $chestCirc = htmlspecialchars($_POST['chest-circ'], ENT_QUOTES, 'UTF-8');
        $abdominalCirc = htmlspecialchars($_POST['abdominal-circ'], ENT_QUOTES, 'UTF-8');
    
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

    // If successful
    $response['status'] = 'success';
    $response['message'] = 'Patient added successfully!';
} catch (Exception $e) {
    // If there's an error
    $response['status'] = 'error';
    $response['message'] = 'Failed to add patient: ' . $e->getMessage();
}

echo json_encode($response);
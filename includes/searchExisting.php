<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajaxSearch'])) {
    $searchTerm = htmlspecialchars($_POST['searchTerm'], ENT_QUOTES, 'UTF-8');
    $stmt = $pdo->prepare("SELECT id, name FROM patient_info WHERE name LIKE :searchTerm;");
    $likeTerm = "%" . $searchTerm . "%";
    $stmt->bindParam(':searchTerm', $likeTerm, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($results) > 0) {
        echo "<ul class='patient-list'>";
        foreach ($results as $row) {
            echo "<li data-id='" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p class='no-results'>No results found.</p>";
    }
}
?>
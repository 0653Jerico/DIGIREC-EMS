<?php

$db = "mysql:host=localhost;dbname=digirec_db";
$dbusername = "root";
$dbpwd = "";

// Connection
try {
    $pdo = new PDO($db, $dbusername, $dbpwd);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection Failed: " . $e->getMessage();
}
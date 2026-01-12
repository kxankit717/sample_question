<?php

$host = "localhost";
$dbname = "event_db";
$username = "root";
$password = "";

// $host = "localhost";
// $dbname = "shashanka_poudel";
// $username = "shashanka_poudel";
// $password = "Plh7nkKh1q";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database connected successfully";
} 
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
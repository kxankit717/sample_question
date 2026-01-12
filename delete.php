<?php
include "db.php";

$id = $_GET['id'];

try{

    $sql = "DELETE FROM registrations WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
}catch(Exception $e){
    echo $e->getMessage();
}

header("Location: index.php");
?>

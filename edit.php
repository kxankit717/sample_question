<?php
include "db.php";

$id = $_GET['id'];

// Fetch existing data

try{
    $sql = "SELECT * FROM registrations WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch(Exception $e){
    echo $e->getMessage();
}

// Update logic
if (isset($_POST['update'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $event_name = $_POST['event_name'];
    $registration_fee = $_POST['registration_fee'];

    $updateSql = "UPDATE registrations SET full_name=?, email=?, address=?, phone=?, event_name=?, registration_fee=? WHERE id=?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->execute([$full_name, $email, $address, $phone, $event_name, $registration_fee, $id]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">
    <input type="text" name="full_name" value="<?= $student['full_name']; ?>" required><br><br>
    <input type="email" name="email" value="<?= $student['email']; ?>" required><br><br>
    <input type="text" name="address" value="<?= $student['address']; ?>" required><br><br>
    <input type="text" name="phone" value="<?= $student['phone']; ?>" required><br><br>
    <input type="text" name="event_name" value="<?= $student['event_name']; ?>" required><br><br>
    <input type="text" name="registration_fee" value="<?= $student['registration_fee']; ?>" required><br><br>

    <button type="submit" name="update">Update Student</button>
</form>

</body>
</html>

<?php
include "db.php";

try {
$sql = "SELECT * FROM registrations";
$stmt = $conn->prepare($sql);
$stmt->execute();
$registrations = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 catch(Exception $e){
    echo $e->getMessage();
}

?>





<!DOCTYPE html>
<html>
<head>
    <title>Event Registration Form</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<a href="add.php">➕ Add New Student</a>
<br><br>

<h2>Student List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>full_name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone</th>
        <th>event_name</th>
        <th>registration_fee</th>
        <th>registered_at</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($registrations as $student): ?>
        <tr>
            <td><?= $student['id']; ?></td>
            <td><?= $student['full_name']; ?></td>
            <td><?= $student['email']; ?></td>
            <td><?= $student['address']; ?></td>
            <td><?= $student['phone']; ?></td>
            <td><?= $student['event_name']; ?></td>
            <td><?= $student['registration_fee']; ?></td>
            <td><?= $student['registered_at']; ?></td>
            <td>
                <a href="edit.php?id=<?= $student['id']; ?>">Edit</a>
                |
                <a href="delete.php?id=<?= $student['id']; ?>"
                   onclick="return confirm('Are you sure?');">
                   Delete
                </a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>



</body>
</html>

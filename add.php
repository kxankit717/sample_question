<?php
include "db.php";

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $event_name = $_POST['event_name'];
    $registration_fee = $_POST['registration_fee'];

// trim($_post[]); for removing white space
    
    if(!ctype_digit($phone) || strlen($phone) != 10 ){
        echo "Only numbers and must be 10 digit";

        exit;

    }
    elseif(!ctype_digit($registration_fee) || $registration_fee < 0){
        echo "Registration fee must be positive number";
        exit;
    }

    else{

    try{
        $sql = "INSERT INTO registrations (full_name, email, address, phone, event_name, registration_fee) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$full_name, $email, $address, $phone, $event_name, $registration_fee]);
    }
catch(Exception $e){
    echo $e->getMessage();
}

    header("Location: index.php");
}}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

<h2>Add New Student</h2>

<form method="POST">
    <label>full_name:</label><br>
    <input type="text" name="full_name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Address:</label><br>
    <input type="text" name="address" required><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" required><br><br>

    <label>event_name:</label><br>
    <input type="text" name="event_name" required><br><br>

    <label>registration_fee:</label><br>
    <input type="text" name="registration_fee" required><br><br>

    <button type="submit" name="submit">Add Student</button>
</form>

<br>
<a href="index.php">Back to Student List</a>

<style>
form {
    max-width: 480px;
    margin: 4rem auto;
    padding: 2rem;
    border-radius: 8px;
    background:#f9fafb;
}
body,
form * {
    font-family: Arial, Helvetica, sans-serif;
    color: #333;
}
label {
    display: block;
    margin-bottom: .4rem;
    font-weight: 600;
}
input[type="text"],
input[type="email"] {
    width: 100%;
    padding: .6rem .8rem;
    margin-bottom: 1.2rem;
    border: 1px solid #bbb;
    border-radius: 4px;
    font-size: 1rem;
    box-sizing: border-box;
}
input[type="text"]:focus,
input[type="email"]:focus {
    outline: none;
    border-color:#3b82f6;
}
button[type="submit"] {
    display: inline-block;
    padding: .8rem 1.6rem;
    background:#3b82f6;
    color:white;
    border:none;
    border-radius: 4px;
    font-size: 1rem;
    cursor:pointer;
    transition:background .2s ease-in-out, transform .1s ease-in-out;
}
button[type="submit"]:hover {
    background:#2563eb;
    transform: translateY(-1px);
}

</style>

</body>
</html>

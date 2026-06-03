<?php

session_start();

include "../includes/db.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$user_id = $_POST['user_id'] ?? '';

$sql = "SELECT * FROM admins 
        WHERE username='$username' 
        AND password='$password'";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

    $row = $result->fetch_assoc();

    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = strtolower(trim($row['role']));
    header("Location: ../index.php");
    exit();

} else {

    echo "Invalid username or password";

}

?>
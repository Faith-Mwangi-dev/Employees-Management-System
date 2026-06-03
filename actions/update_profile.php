<?php
session_start();
include "../includes/db.php";

$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];

$user_id = $_SESSION['user_id'];

$sql = "UPDATE employees
        SET fname='$fname',
            lname='$lname',
            email='$email'
        WHERE id='$id'
        AND user_id='$user_id'";

$conn->query($sql);

header("Location: ../index.php");
?>
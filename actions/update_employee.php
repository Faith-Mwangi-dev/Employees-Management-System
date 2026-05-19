<?php
include "../includes/db.php";
$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$department = $_POST['department'];
$salary = $_POST['salary'];
$hire_date = $_POST['hire_date'];

$conn->query("UPDATE employees SET
    fname = '$fname',
    lname = '$lname',
    email = '$email',
    department = '$department',
    salary = '$salary',
    hire_date = '$hire_date'
    WHERE id = $id
");

header("Location:../index.php");
?>




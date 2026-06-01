<?php
session_start();
include "../includes/db.php";
if ($_SESSION['role'] != 'admin') {
    die("Access denied");
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$department = $_POST['department'];
$salary = $_POST['salary'];
$hire_date = $_POST['hire_date'];

$sql = "INSERT INTO employees (fname, lname, email, department, salary, hire_date) VALUES ('$fname', '$lname', '$email',  '$department', '$salary', '$hire_date')" ;

if ($conn->query($sql)) {
    header("Location: ../index.php");
} else {
    echo "Error: " . $conn->error;
}
?>
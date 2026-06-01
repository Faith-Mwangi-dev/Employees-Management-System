<?php

session_start();
include "../includes/db.php";

if ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'hr') {
    die("Access denied");
}

$id = $_POST['id'];
$salary = $_POST['salary'];

$conn->query("UPDATE employees SET salary='$salary' WHERE id=$id");

header("Location: ../index.php");
exit();

?>
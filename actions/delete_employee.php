<?php
session_start();
include "../includes/db.php";
if ($_SESSION['role'] != 'admin') {
    die("Access denied");
}
$id = $_GET['id'];
$conn->query("DELETE FROM employees WHERE id=$id");
header("Location: ../index.php");
?>
<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "includes/db.php";
include "includes/header.php";
?>

<div class="container mt-4">
    <?php
    //Employees can only view
    if ($_SESSION['role'] == 'staff') {
        echo "<div class='alert alert-info'>You have view-only access.</div>";
    }
    ?>

    <?php 
    // Only admin can add employees
    if ($_SESSION['role'] == 'admin') { 
    ?>
        <a class="btn btn-success mb-3" href="add_employee.php"> Add Employee </a>
    <?php } ?>

    <?php
    $result = $conn->query("SELECT * FROM employees");
    while($row = $result->fetch_assoc()) {
    ?>

        <div class="card mb-3 shadow-sm">

            <div class="card-body">

                <h3 class="card-title"> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h3>

                <p><strong>Email:</strong> <?php echo $row['email']; ?></p>

                <p><strong>Department:</strong> <?php echo $row['department']; ?></p>

                <p> <strong>Salary:</strong>KES <?php echo $row['salary']; ?></p>

                <p><strong>Date hired:</strong> <?php echo $row['hire_date']; ?></p>

                <!-- ADMIN ONLY -->
                <?php if ($_SESSION['role'] == 'admin') { ?>
                    <a class="btn btn-danger"
                    href="actions/delete_employee.php?id=<?php echo $row['id']; ?>"> Delete
                    </a>

                <?php } ?>

                <!-- ADMIN ONLY -->
                <?php 
                if ($_SESSION['role'] == 'admin') { 
                ?>
                    <a class="btn btn-primary" 
                    href="edit_employee.php?id=<?php echo $row['id']; ?>">Edit
                    </a>
                <?php } ?>

                <!-- HR  and admin -->
                <?php if ($_SESSION['role'] == 'hr' ||  $_SESSION['role'] == 'admin') { ?>
                    <a class="btn btn-warning"
                    href="edit_salary_form.php?id=<?php echo $row['id']; ?>"> Update Salary 
                    </a>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<a class = "add-btn" href = "/employee_management/add_employee.php">Add Employee</a>


<?php
$result = $conn->query("SELECT * FROM employees");

while($row = $result->fetch_assoc()) {
?>

<div class="employee-card">
    <h3><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h3>

    <p>Email: <?php echo $row['email']; ?></p>

    <p>Department: <?php echo $row['department']; ?></p>

    <p>Salary: KES <?php echo $row['salary']; ?></p>

    <p>Date hired: <?php echo $row['hire_date']; ?></p>

    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
</div>

<?php } ?>

include "includes/footer.php" ;
?>
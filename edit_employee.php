<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM employees WHERE id=$id");
$row = $result->fetch_assoc();
?>
<h2>Edit Employee</h2>
<div class ="container">
    <form action = "actions/update_employee.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>FirstName:</label><br>
        <input type = "text" name="fname" value="<?php echo $row['fname']; ?>"><br>
        <label>LastName:</label><br>
        <input type = "text" name="lname" value="<?php echo $row['lname']; ?>"><br>
        <label>Email:</label><br>
        <input type = "text" name="email" value="<?php echo $row['email']; ?>"><br>

        <select name ="department"><br>
            <option value="ICT"
                <?php if($row['department'] == 'ICT') echo 'selected'; ?>>
                ICT
            </option>
            <option value="HR"
                <?php if($row['department'] == 'HR') echo 'selected'; ?>>
                HR
            </option>
            <option value="Finance"
                <?php if($row['department'] == 'Finance') echo 'selected'; ?>>
                Finance
            </option>
            <option value="marketing"
                <?php if($row['department'] == 'marketing') echo 'selected'; ?>>
                Marketing
            </option>
            <option value="Operations"
                <?php if($row['department'] == 'Operations') echo 'selected'; ?>>
                Operations
            </option>

        </select><br><br>
        <label>Salary:</label><br>
        <input type = "text" name="salary" value="<?php echo $row['salary']; ?>"><br>
        <label>Date hired:</label><br>
        <input type = "date" name="hire_date" value="<?php echo $row['hire_date']; ?>"><br>
    </form>
</div>

<?php include "includes/footer.php"; ?>
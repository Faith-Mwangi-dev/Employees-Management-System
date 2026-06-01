<?php

session_start();

include "includes/db.php";

// Allow only admin and HR
if ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'hr') {

    die("Access denied");
}
// Get employee ID
$id = $_GET['id'];
// Fetch employee data
$result = $conn->query("SELECT * FROM employees WHERE id=$id");
$row = $result->fetch_assoc();
include "includes/header.php";
?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="mb-4"> Edit Salary </h2>
            <form action="actions/edit_salary.php" method="POST">
                
                <!-- Hidden employee ID -->
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <label class="form-label"> Employee Name </label>
                    <input type="text" class="form-control"
                    value="<?php echo $row['fname']; ?> <?php echo $row['lname']; ?>"readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Salary</label>
                    <input type="number" name="salary" class="form-control" 
                    value="<?php echo $row['salary']; ?>"required>
                </div>
                <button type="submit" class="btn btn-primary"> Update Salary </button>
            </form>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php
session_start();
include "includes/db.php";

//Allow admin and staff
if ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'staff') {
    die("Access denied");
}
//Get employee ID
$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$result = $conn->query(
    "SELECT * FROM employees
     WHERE id='$id' AND user_id='$user_id'"
);
if ($result->num_rows == 0) {
    die("Access Denied");
}

$row = $result->fetch_assoc();
include "includes/header.php";
?>

<div class="container mt-5">
    <div class = "card-shadow">
        <div class = "card-body">
            <h2> Update Profile </h2>

            <form method="POST" action="actions/update_profile.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class = "mb-3">

                    First Name:
                    <input type="text" name="fname" class="form-control"
                        value="<?php echo $row['fname']; ?>">

                    Last Name:
                    <input type="text" name="lname" class="form-control"
                        value="<?php echo $row['lname']; ?>">

                    Email:
                    <input type="text" name="email" class="form-control"
                        value="<?php echo $row['email']; ?>">
                </div>
                <button type="submit" class = "btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
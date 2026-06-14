<?php
include "includes/db.php";

$id = $_GET['id'];

if(isset($_POST['reset'])){

    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if($password != $confirm){

        $error = "Passwords do not match.";

    } else {

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare(
            "UPDATE admins SET password=? WHERE id=?"
        );

        $stmt->bind_param("si", $hashed, $id);

        if($stmt->execute()){

            header("Location: login.php?success=1");
            exit();

        } else {

            $error = "Failed to update password.";

        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>

<h2>Reset Password</h2>

<?php
if(isset($error)){
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">

    New Password:<br>
    <input type="password" name="password" required><br><br>

    Confirm Password:<br>
    <input type="password" name="confirm" required><br><br>

    <button type="submit" name="reset">
        Reset Password
    </button>

</form>

</body>
</html>
<?php
include "includes/db.php";

if(isset($_POST['verify'])){

    $username = $_POST['username'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("
        SELECT admins.id
        FROM admins
        INNER JOIN employees
        ON admins.id = employees.user_id
        WHERE admins.username = ?
        AND employees.email = ?
    ");

    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        header("Location: reset_password.php?id=".$user['id']);
        exit();

    } else {
        $error = "Username and email do not match.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>

<h2>Forgot Password</h2>

<?php
if(isset($error)){
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">

    Username:<br>
    <input type="text" name="username" required><br><br>

    Email:<br>
    <input type="email" name="email" required><br><br>

    <button type="submit" name="verify">
        Verify
    </button>

</form>

</body>
</html>
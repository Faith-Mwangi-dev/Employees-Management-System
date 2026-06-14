<?php include "includes/header.php"; ?>
<?php
if(isset($_GET['success'])){
    echo "<div class='alert alert-success'>
            Password changed successfully.
          </div>";
}
?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-body">

                    <h3 class="text-center mb-4"> Login </h3>

                    <form action="actions/authenticate.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label"> Username </label>
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Password  </label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100"> Login </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
<a href="forgot_password.php">Forgot Password?</a>

<?php include "includes/footer.php"; ?>
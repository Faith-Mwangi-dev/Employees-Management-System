<?php include "includes/header.php"; ?>

<h2>Add Employee </h2>

<div class = "container">
    <form action = "actions/insert_employee.php" method="POST">
        <p> Key in your details </p>
        <input type = "text" name="fname" placeholder ="FirstName" required><br>
        <input type = "text" name="lname" placeholder ="LastName" required><br>
        <input type = "text" name="email" placeholder ="Your email" required><br>
        <select name = "department">
            <option> ICT </option>
            <option> HR </option>
            <option> Finance </option>
            <option> Marketing </option>
            <option> Operations </option>
        </select><br>
        <input type = "number" name="salary" placeholder ="Salary" required><br>
        <input type = "date" name="hire_date" placeholder ="hire_date" required><br>
        <button type = "submit"> Add Employee </button>
    </form>
</div>


<?php include "includes/footer.php"; ?>
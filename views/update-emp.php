<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <title>Update Employee</title>
</head>
<body>
    <div class="update-emp">
        <h1>Update Employee</h1>

        <form id="update-emp-form" action="./?action=update_employee" method="POST">

            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="<?php echo $employee['first_name']; ?>">

            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="<?php echo $employee['last_name']; ?>">

            <label for="birth_date">Birthdate</label>
            <input type="date" name="birth_date" value="<?php echo $employee['birth_date']; ?>">

            <label for="gender">Gender</label>
            <select name="gender">
                <option value="M" <?php if($employee['gender'] == 'M') {echo "selected";}?>>M</option>
                <option value="F" <?php if($employee['gender'] == 'F') {echo "selected";}?>>F</option>
            </select>

            <label for="hire_date">Hire Date</label>
            <input type="date" name="hire_date" value="<?php echo $employee['hire_date']; ?>">

            <input type="hidden" name="emp_ID" value=<?php echo $employee['emp_ID']; ?>> 
            <input type="submit" value="Update">

        </form>
    </div>
</body>
</html>


    
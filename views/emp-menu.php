<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <title>Employee Directory</title>
</head>
<body>
    <div class="emp-menu">
        <h1>Employees</h1>

        <?php

        if(isset($message)) {echo $message;}

        ?>

        <h2>Add Employee</h2>

        <form id="add-emp-form" action="./?action=add_employee" method="post">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name">

            <label for="last_name">Last Name</label>
            <input type="text" name="last_name">

            <label for="birth_date">Birthdate</label>
            <input type="date" name="birth_date">

            <label for="gender">Gender</label>
            <select name="gender">
                <option value="M">M</option>
                <option value="F">F</option>
            </select>

            <label for="hire_date">Hire Date</label>
            <input type="date" name="hire_date">

            <input type="submit" value="Add">
        </form>

        <h2>Employee List</h2>

        
        <?php

            echo displayEmployees($employees);

        ?>

    </div>
</body>
</html>

<?php

require_once __DIR__ . '\connect.php';

/*

This model provides the functions necessary to perform CRUD operations on the
employee_dir database. The first of these has detailed comments of what is happening,
the rest

*/


function addEmployee($first_name, $last_name, $birth_date, $gender, $hire_date) {
    
    // Create a connection object using the employee directory connection function
    $db = empDirConnect();

    // The SQL statement
    $sql = 'INSERT INTO employees (emp_id, first_name, last_name , birth_date, gender, hire_date)
        VALUES (DEFAULT, :first_name, :last_name , :birth_date, :gender, :hire_date)';

    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);

    // The next five lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindValue(':birth_date', $birth_date, PDO::PARAM_STR);
    $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindValue(':hire_date', $hire_date, PDO::PARAM_STR);

    // Insert the data
    $stmt->execute();

    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();

    // Close the database interaction
    $stmt->closeCursor();

    // Return the indication of success (rows changed)
    return $rowsChanged;
       
}

function getEmployees() {
    $db = empDirConnect();
    $sql = 'SELECT * FROM employees';

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $employees = $stmt->fetchAll();
    $stmt->closeCursor();

    return $employees;
}

function displayEmployees($employees) {

    // Turns an array of employees into readable HTML

    $empList = "<div class='emp-list'>";
    
    foreach($employees as $employee) {
        $empCard = "<div class='emp-card'>";
            $empCard .= "<h3>" . $employee['first_name'] . " " . $employee['last_name'] . "</h3>";
            $empCard .= "<p>Birth date: " . $employee['birth_date'] . "</p>";
            $empCard .= "<p>Gender: " . $employee['gender'] . "</p>";
            $empCard .= "<p>Hire date: " . $employee['hire_date'] . "</p>";
            $empCard .= "<a href='.\?action=update_view&emp_ID=" . $employee['emp_ID'] . "'>Update</a><br>";
            $empCard .= "<a href='.\?action=delete_employee&emp_ID=" . $employee['emp_ID'] . "'>Delete</a>";
        $empCard .= "</div>";
        $empList .= $empCard;
    }
    
    return $empList;
}

function deleteEmployee($emp_ID) {
    $db = empDirConnect();

    $sql = 'DELETE FROM employees WHERE emp_ID = :emp_ID';

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':emp_ID', $emp_ID, PDO::PARAM_INT);
    $stmt->execute();

    $rowsDeleted = $stmt->rowCount();
    $stmt->closeCursor();

    return $rowsDeleted;
}

function getEmpById($emp_ID) {
    $db = empDirConnect();

    $sql = 'SELECT * FROM employees WHERE emp_ID = :emp_ID';

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':emp_ID', $emp_ID, PDO::PARAM_INT);
    $stmt->execute();

    $employee = $stmt->fetch();
    $stmt->closeCursor();

    return $employee;
}

function updateEmployee($emp_ID, $first_name, $last_name, $birth_date, $gender, $hire_date) {
    $db = empDirConnect();

    $sql = 'UPDATE employees SET first_name = :first_name, last_name = :last_name, 
        birth_date = :birth_date, gender = :gender, hire_date = :hire_date WHERE emp_ID = :emp_ID';
    
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindValue(':birth_date', $birth_date, PDO::PARAM_STR);
    $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindValue(':hire_date', $hire_date, PDO::PARAM_STR);
    $stmt->bindValue(':emp_ID', $emp_ID, PDO::PARAM_INT);
    $stmt->execute();

    $rowsUpdated = $stmt->rowCount();
    $stmt->closeCursor();

    return $rowsUpdated;
}

?>
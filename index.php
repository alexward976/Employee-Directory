<?php

require_once 'models/emp-model.php';

$action = filter_input(INPUT_POST, 'action');
 
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

$employees = getEmployees();

switch ($action){
    case 'add_employee':
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $birth_date = filter_input(INPUT_POST, 'birth_date');
        $gender = filter_input(INPUT_POST, 'gender');
        $hire_date = filter_input(INPUT_POST, 'hire_date');
        
        $addResult = addEmployee($first_name, $last_name, $birth_date, $gender, $hire_date);

        if($addResult == 1) {
            header("Location: ./");
            break;
        } else {
            $message = "<p class='error-msg'>There was an error. The employee was not added to the directory.</p>";
            include 'views/emp-menu.php';
            break;
        }        


    case 'update_view':
        $emp_ID = filter_input(INPUT_GET, 'emp_ID');

        $employee = getEmpById($emp_ID);

        include 'views/update-emp.php';
        break;
        
    case 'update_employee':
        $emp_ID = filter_input(INPUT_POST, 'emp_ID', FILTER_VALIDATE_INT);
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $birth_date = filter_input(INPUT_POST, 'birth_date');
        $gender = filter_input(INPUT_POST, 'gender');
        $hire_date = filter_input(INPUT_POST, 'hire_date');

        $updateResult = updateEmployee($emp_ID, $first_name, $last_name, $birth_date, $gender, $hire_date);
        
        if($updateResult) {
            header('Location: ./');
            break;
        } else {
            $message = "<p class='error-msg'>There was an error. The employee was not updated.</p>";
            $employee = getEmpById($emp_ID);
            include 'views/update-emp.php';
            break;
        }
        

    case 'delete_employee':
        $emp_ID = filter_input(INPUT_GET, 'emp_ID');

        $deleteResult = deleteEmployee($emp_ID);

        if($deleteResult == 1) {
            header("Location: ./");
            break;
        } else {
            $message = "<p class='error-msg'>There was an error. The employee was not deleted from the directory.</p>";
            include 'views/emp-menu.php';
            break;
        }


    default:
        include 'views/emp-menu.php';
        break;
}

?>
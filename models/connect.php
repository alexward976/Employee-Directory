<?php

// Establish connection to employee_dir MySQL database
function empDirConnect(){
    // Create variables for user login info
    $server = 'localhost';
    $dbname= 'employee_dir';
    $username = 'iClient';
    $password = 'ddLZcwrbD[Xr]*Tj'; 
    $dsn = "mysql:host=$server;dbname=$dbname";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
   
    // Create the actual connection object and assign it to a variable
    try {
        $link = new PDO($dsn, $username, $password, $options);
        return $link;
    } catch(PDOException $e) {
        header('Location: ' . __DIR__ . '/employee-directory/views/500.php');
        exit;
    }
}

?>
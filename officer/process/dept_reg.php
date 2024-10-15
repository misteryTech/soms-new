<?php
session_start();
include("../../include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_name = mysqli_real_escape_string($connection, $_POST['department_name']);

    
    $check_query = "SELECT * FROM department WHERE department_name = '$department_name'";
    $result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($result) > 0) {
        
        $_SESSION['error'] = "Error: Department already exists.";
        header("Location: ../department_reg.php");
        exit();
    } else {
        
        $query = "INSERT INTO department (department_name) VALUES ('$department_name')";

        if (mysqli_query($connection, $query)) {
            $_SESSION['success'] = "Department registered successfully!";
            header("Location: ../department_reg.php");
            exit();
        } else {
            $_SESSION['error'] = "Error: " . $query . "<br>" . mysqli_error($connection);
            header("Location: ../department_reg.php");
            exit();
        }
    }
}

mysqli_close($connection);
?>
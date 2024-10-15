<?php
session_start();
include("../../include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = mysqli_real_escape_string($connection, $_POST['course']);
    $department = mysqli_real_escape_string($connection, $_POST['department']);

$query = "INSERT INTO department(
        department_name,  course
    ) VALUES (
        '$department', '$course'
    )";

    if (mysqli_query($connection, $query)) {
        $_SESSION['success'] = "course registered successfully!";
        header("Location: ../course_registration.php");
        exit();
    } else {
        $_SESSION['error'] = "Error: " . $query . "<br>" . mysqli_error($connection);
        header("Location: ../course_registration.php");
        exit();
    }
}

mysqli_close($connection);
?>

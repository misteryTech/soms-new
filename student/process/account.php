<?php
session_start();
include("../../include/connection.php");


if (!isset($_SESSION['student_id'])) {
    $_SESSION['error'] = "You must be logged in to update your account details.";
    header("Location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $student_id = mysqli_real_escape_string($connection, $_SESSION['student_id']);
    
    
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $first_name = mysqli_real_escape_string($connection, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_ame']);
    $middle_name = mysqli_real_escape_string($connection, $_POST['middlename']);
    $year = mysqli_real_escape_string($connection, $_POST['year']);
    $section = mysqli_real_escape_string($connection, $_POST['section']);
    $course = mysqli_real_escape_string($connection, $_POST['course']);
    
    
    
    $updateQuery = "
        UPDATE students
        SET 
            username = '$username',
            password = '$password',
            first_name = '$first_name',
            last_name = '$last_name',
            year = '$year',
            section = '$section',
            course = '$course'
        WHERE student_id = '$student_id'
    ";
    
    if (mysqli_query($connection, $updateQuery)) {
        $_SESSION['success'] = "Account details updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update account details. Please try again.";
    }
    
    header("Location: ../account.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: ../account.php");
    exit();
}
?>

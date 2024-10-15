<?php
session_start();
include("../../include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = mysqli_real_escape_string($connection, $_POST['edit_student_name']);
    $course = mysqli_real_escape_string($connection, $_POST['edit_course']); 
    $year = mysqli_real_escape_string($connection, $_POST['edit_year']);
    $officer_email = mysqli_real_escape_string($connection, $_POST['edit_officer_email']);   
    $officer_phone = mysqli_real_escape_string($connection, $_POST['edit_officer_phone']);
    $position = mysqli_real_escape_string($connection, $_POST['edit_position']);
    
    
    $officer_id = mysqli_real_escape_string($connection, $_POST['officer_id']);

    $query = "UPDATE officers SET 
        student_name='$student_name',
        course='$course',
        year='$year', 
        officer_email='$officer_email',
        officer_phone='$officer_phone', 
        position='$position'  
        WHERE id='$officer_id'";

    if (mysqli_query($connection, $query)) {
        $_SESSION['success'] = "Officer information updated successfully!";
    } else {
        $_SESSION['error'] = "Error: " . $query . "<br>" . mysqli_error($connection);
    }

    header("Location: ../officers_data.php"); 
    exit();
}

mysqli_close($connection);
?>
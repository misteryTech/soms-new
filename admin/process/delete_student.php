<?php
include("../../include/connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['student_id'])) {
        $student_id = $_POST['student_id'];

        
        $delete_query = "DELETE FROM students WHERE id='$student_id'";
        $delete_result = mysqli_query($connection, $delete_query);

        if ($delete_result) {
            $_SESSION['success'] = "Student deleted successfully!";
            header("Location: ../students_data.php"); 
            exit();
        } else {
            $_SESSION['error'] = "Failed to delete student!";
            header("Location: ../students_data.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Student ID not provided!";
        header("Location: ../students_data.php"); 
        exit();
    }
} else {
    
    header("Location: ../students_data.php");
    exit();
}
?>

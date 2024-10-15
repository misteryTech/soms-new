<?php
session_start();
include("../../include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $edit_id = mysqli_real_escape_string($connection, $_POST['edit_id']);
    $username = mysqli_real_escape_string($connection, $_POST['edit_username']); 
    $lastname = mysqli_real_escape_string($connection, $_POST['edit_lastname']);
    $firstname = mysqli_real_escape_string($connection, $_POST['edit_firstname']);   
    $middlename = mysqli_real_escape_string($connection, $_POST['edit_middlename']);
    $course = mysqli_real_escape_string($connection, $_POST['edit_course']);
    $year = mysqli_real_escape_string($connection, $_POST['edit_year']);
    $section = mysqli_real_escape_string($connection, $_POST['edit_section']);
    $gender = mysqli_real_escape_string($connection, $_POST['edit_gender']);
    $dob = mysqli_real_escape_string($connection, $_POST['edit_dob']);
    $age = mysqli_real_escape_string($connection, $_POST['edit_age']);
    $email = mysqli_real_escape_string($connection, $_POST['edit_email']);
    $phone = mysqli_real_escape_string($connection, $_POST['edit_phone']);
    $street = mysqli_real_escape_string($connection, $_POST['edit_street']);
    $barangay = mysqli_real_escape_string($connection, $_POST['edit_barangay']);
    $municipality = mysqli_real_escape_string($connection, $_POST['edit_municipality']);
    $province = mysqli_real_escape_string($connection, $_POST['edit_province']);

    $query = "UPDATE students SET 
    username='$username',
    student_id='$edit_id',
    password='$password',
    lastname='$lastname', 
    firstname='$firstname',
    middlename='$middlename', 
    course='$course', 
    year='$year', 
    section='$section', 
    gender='$gender',
    dob='$dob',
    age='$age',
    email='$email',
    phone='$phone',
    street='$street', 
    barangay='$barangay', 
    municipality='$municipality', 
    province='$province' 
    WHERE id='$id'";

    if (mysqli_query($connection, $query)) {
        $_SESSION['success'] = "Student information updated successfully!";
    } else {
        $_SESSION['error'] = "Error: " . $query . "<br>" . mysqli_error($connection);
    }

    header("Location: ../students_data.php"); 
    exit();
}

mysqli_close($connection);
?>

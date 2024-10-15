<?php
session_start();
include("../../include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = mysqli_real_escape_string($connection, $_POST['student_id']);
    $username = mysqli_real_escape_string($connection, $_POST['username']); 
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);   
    $middlename = mysqli_real_escape_string($connection, $_POST['middlename']);
    $course = mysqli_real_escape_string($connection, $_POST['course']);
    $year = mysqli_real_escape_string($connection, $_POST['year']);
    $section = mysqli_real_escape_string($connection, $_POST['section']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $dob = mysqli_real_escape_string($connection, $_POST['dob']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $street = mysqli_real_escape_string($connection, $_POST['street']);
    $barangay = mysqli_real_escape_string($connection, $_POST['barangay']);
    $municipality = mysqli_real_escape_string($connection, $_POST['city']);
    $province = mysqli_real_escape_string($connection, $_POST['province']);
    $region = mysqli_real_escape_string($connection, $_POST['region']);
    $role = "Students";

    $query = "INSERT INTO students (
        student_id, username, password, lastname, firstname, middlename, course, year, section, gender, dob, age, email, phone, street, barangay, municipality, province, role, region
    ) VALUES (
        '$student_id', '$username', '$password', '$lastname', '$firstname', '$middlename', '$course', '$year', '$section', '$gender', '$dob', '$age', '$email', '$phone', '$street', '$barangay', '$municipality', '$province', '$role', '$region'
    )";

    if (mysqli_query($connection, $query)) {
        $_SESSION['success'] = "Student registered successfully!";
        header("Location: ../students_data.php");
        exit();
    } else {
        $_SESSION['error'] = "Error: " . $query . "<br>" . mysqli_error($connection);
        header("Location: ../students_data.php");
        exit();
    }
}

mysqli_close($connection);
?>

<?php
include("../../include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = mysqli_real_escape_string($connection, $_POST['student_name']);
    $officer_email = mysqli_real_escape_string($connection, $_POST['officer_email']);
    $officer_phone = mysqli_real_escape_string($connection, $_POST['officer_phone']);
    $course = mysqli_real_escape_string($connection, $_POST['course']);
    $year = mysqli_real_escape_string($connection, $_POST['year']);
    $organization_name = mysqli_real_escape_string($connection, $_POST['organization_name']);
    $position = mysqli_real_escape_string($connection, $_POST['position']);
    $personal_statement = mysqli_real_escape_string($connection, $_POST['personal_statement']);


    $insertQuery = "INSERT INTO officers (student_name, officer_email, officer_phone, course, year, organization_name, position, personal_statement)
                    VALUES ('$student_name', '$officer_email', '$officer_phone', '$course', '$year', '$organization_name', '$position', '$personal_statement')";

    if (mysqli_query($connection, $insertQuery)) {
        $_SESSION['success'] = "Officer registered successfully!";
    } else {
        $_SESSION['error'] = "Error registering officer: " . mysqli_error($connection);
    }

    echo "<script>alert('succefully registered')</script>";
    echo "<script>windows.location.href='view_org.php'</script>";
    exit();
}

mysqli_close($connection);
?>
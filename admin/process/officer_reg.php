<?php
session_start();
include("../../include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $student_name = mysqli_real_escape_string($connection, $_POST['student_name']);
    $organization_name = mysqli_real_escape_string($connection, $_POST['organization_name']);
    $position = mysqli_real_escape_string($connection, $_POST['position']);
    $personal_statement = mysqli_real_escape_string($connection, $_POST['personal_statement']);
    $course = mysqli_real_escape_string($connection, $_POST['course']);
    $year = mysqli_real_escape_string($connection, $_POST['year']);

    // Insert query to add the new officer
    $insertQuery = "INSERT INTO officers (student_name, officer_email, officer_phone, course, year, organization_name, position, personal_statement)
                    VALUES ('$student_name', '$officer_email', '$officer_phone', '$course', '$year', '$organization_name', '$position', '$personal_statement')";

    // Execute the insert query
    if (mysqli_query($connection, $insertQuery)) {
        // Update the position in the students table if the insert query was successful
        $updateQuery = "UPDATE students SET position = '$position' WHERE id = '$student_name'";

        if (mysqli_query($connection, $updateQuery)) {
            $_SESSION['success'] = "Officer registered and student information updated successfully!";
        } else {
            $_SESSION['error'] = "Error updating student information: " . mysqli_error($connection);
        }
    } else {
        $_SESSION['error'] = "Error registering officer: " . mysqli_error($connection);
    }

    // Redirect to the officers data page
    header("Location: ../officers_data.php");
    exit();
}

// Close the database connection
mysqli_close($connection);
?>

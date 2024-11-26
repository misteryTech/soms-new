<?php
session_start();
include("../../include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $section = mysqli_real_escape_string($connection, $_POST['section']);

$query = "INSERT INTO section(
          section
    ) VALUES (
         '$section'
    )";

    if (mysqli_query($connection, $query)) {
        $_SESSION['success'] = "section registered successfully!";
        header("Location: ../section_registration.php");
        exit();
    } else {7
        $_SESSION['error'] = "Error: " . $query . "<br>" . mysqli_error($connection);
        header("Location: ../section_registration.php");
        exit();
    }
}

mysqli_close($connection);
?>

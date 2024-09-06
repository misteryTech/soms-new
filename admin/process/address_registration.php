<?php
session_start();
include("../../include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $barangay = mysqli_real_escape_string($connection, $_POST['barangay']);
    $municipality = mysqli_real_escape_string($connection, $_POST['municipality']);
    $province = mysqli_real_escape_string($connection, $_POST['province']);

$query = "INSERT INTO address (
        province,  municipality, barangay
    ) VALUES (
        '$province', '$municipality', '$barangay'
    )";

    if (mysqli_query($connection, $query)) {
        $_SESSION['success'] = "Address registered successfully!";
        header("Location: ../address_registration.php");
        exit();
    } else {
        $_SESSION['error'] = "Error: " . $query . "<br>" . mysqli_error($connection);
        header("Location: ../address_registration.php");
        exit();
    }
}

mysqli_close($connection);
?>

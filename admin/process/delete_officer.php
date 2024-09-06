<?php
session_start();
include("../../include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $officers_id = mysqli_real_escape_string($connection, $_POST['officers_id']);

    $deleteQuery = "DELETE FROM officers WHERE id = '$officers_id'";

    if (mysqli_query($connection, $deleteQuery)) {
        $_SESSION['success'] = "Officer deleted successfully!";
    } else {
        $_SESSION['error'] = "Error deleting officer: " . mysqli_error($connection);
    }

    header("Location: ../officers_data.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid request method.";
    header("Location: ../officers_data.php");
    exit();
}

mysqli_close($connection);
?>
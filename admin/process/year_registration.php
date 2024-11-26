<?php
session_start();
include("../../include/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Securely get the year from POST
    $year = trim($_POST['year']);

    // Check if the input is not empty
    if (empty($year)) {
        $_SESSION['error'] = "Year name cannot be empty.";
        header("Location: ../year_registration.php");
        exit();
    }

    // Use prepared statements for security
    $query = "INSERT INTO year (year) VALUES (?)";
    $stmt = $connection->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $year); // "s" indicates string type

        if ($stmt->execute()) {
            $_SESSION['success'] = "Year registered successfully!";
        } else {
            $_SESSION['error'] = "Failed to register the year. Please try again.";
        }

        $stmt->close(); // Close the statement
    } else {
        $_SESSION['error'] = "Database error: Unable to prepare the query.";
    }

    // Redirect back to the form
    header("Location: ../year_registration.php");
    exit();
}

// Close the database connection
mysqli_close($connection);
?>

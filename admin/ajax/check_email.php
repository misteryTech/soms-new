<?php

include('connection.php');

if (isset($_POST['email'])) {
    // Sanitize input to avoid SQL injection
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    // Query to count the email in the department table
    $mysql_query = "SELECT COUNT(*) as count FROM students WHERE email = '$email'";

    // Execute the query
    $mysql_query_result = $connection->query($mysql_query);

    // Check if the query executed successfully
    if ($mysql_query_result) {
        // Fetch the count from the result
        $row = $mysql_query_result->fetch_assoc();
        $count = $row['count'];

        // Check if the email exists or is available
        if ($count > 0) {
            echo 'exists';
        } else {
            echo 'available';
        }
    } else {
        // Error in the query execution
        echo 'Error executing query: ' . $connection->error;
    }
} else {
    // If email is not provided
    echo 'No email provided.';
}

// Close the database connection
$connection->close();
?>

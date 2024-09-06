<?php

include('connection.php');

if (isset($_POST['course'])) {
    // Sanitize input to avoid SQL injection
    $course = mysqli_real_escape_string($connection, $_POST['course']);

    // Query to count the course in the department table
    $mysql_query = "SELECT COUNT(*) as count FROM department WHERE course = '$course'";

    // Execute the query
    $mysql_query_result = $connection->query($mysql_query);

    // Check if the query executed successfully
    if ($mysql_query_result) {
        // Fetch the count from the result
        $row = $mysql_query_result->fetch_assoc();
        $count = $row['count'];

        // Check if the course exists or is available
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
    // If course is not provided
    echo 'No course provided.';
}

// Close the database connection
$connection->close();
?>

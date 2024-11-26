<?php

include('connection.php');

if (isset($_POST['section'])) {
    // Sanitize input to avoid SQL injection
    $section = mysqli_real_escape_string($connection, $_POST['section']);

    // Query to count the section in the department table
    $mysql_query = "SELECT COUNT(*) as count FROM section WHERE section = '$section'";

    // Execute the query
    $mysql_query_result = $connection->query($mysql_query);

    // Check if the query executed successfully
    if ($mysql_query_result) {
        // Fetch the count from the result
        $row = $mysql_query_result->fetch_assoc();
        $count = $row['count'];

        // Check if the section exists or is available
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
    // If section is not provided
    echo 'No section provided.';
}

// Close the database connection
$connection->close();
?>

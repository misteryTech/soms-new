<?php

include('connection.php');

if (isset($_POST['year'])) {
    // Sanitize input to avoid SQL injection
    $year = mysqli_real_escape_string($connection, $_POST['year']);

    // Query to count the year in the department table
    $mysql_query = "SELECT COUNT(*) as count FROM year WHERE year = '$year'";

    // Execute the query
    $mysql_query_result = $connection->query($mysql_query);

    // Check if the query executed successfully
    if ($mysql_query_result) {
        // Fetch the count from the result
        $row = $mysql_query_result->fetch_assoc();
        $count = $row['count'];

        // Check if the year exists or is available
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
    // If year is not provided
    echo 'No year provided.';
}

// Close the database connection
$connection->close();
?>

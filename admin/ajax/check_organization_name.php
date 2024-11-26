<?php
include('../../include/connection.php');  // Ensure this path is correct

// Check if POST data is received
if (isset($_POST['organization_name'])) {
    // Sanitize input to prevent SQL injection
    $organization_name = mysqli_real_escape_string($connection, $_POST['organization_name']);
    
    // Query to check if the organization name exists
    $mysql_query = "SELECT COUNT(*) as count FROM organizations WHERE organization_name = '$organization_name'";

    $result = mysqli_query($connection, $mysql_query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];

        // Respond based on the count
        if ($count > 0) {
            echo 'exists';
        } else {
            echo 'available';
        }
    } else {
        // Error executing query
        echo 'Error executing query: ' . mysqli_error($connection);
    }
} else {
    // If no organization name is provided
    echo 'No organization name provided.';
}

$connection->close();
?>

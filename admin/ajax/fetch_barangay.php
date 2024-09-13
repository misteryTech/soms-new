<?php
// Include the database connection
include('connection.php');

// Check if municipality is sent in the POST request
$municipality = isset($_POST['municipality']) ? $_POST['municipality'] : '';

// Initialize an empty array to hold the response
$response = array();

// Ensure the municipality is valid before running the query
if (!empty($municipality)) {
    // Run the query to fetch barangays based on the municipality
    $query = "SELECT barangay FROM address WHERE municipality = '$municipality' ";

    // Execute the query
    $result = $connection->query($query);

    // Check if the query was successful and return the data
    if ($result && $result->num_rows > 0) {
        // Fetch the rows and store them in the response array
        while ($row = $result->fetch_assoc()) {
            $response[] = $row;
        }
    }
}

// Return the response as JSON
echo json_encode($response);

// Close the database connection
$connection->close();
?>

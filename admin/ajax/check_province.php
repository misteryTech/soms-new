<?php
// Include the database connection
include('connection.php');

// Check if provinceId is sent in the POST request
$provinceId = isset($_POST['provinceId']) ? $_POST['provinceId'] : '';

// Initialize an empty array to hold the response
$response = array();

// Ensure the provinceId is valid before running the query
if (!empty($provinceId) && ctype_digit($provinceId)) {  // Ensures provinceId is numeric
    // Run the query to fetch municipalities based on the provinceId
    $query = "SELECT municipality FROM address WHERE province = '$provinceId'";

    // Execute the query
    $result = $connection->query($query);

    // Check if the query was successful and return the data
    if ($result && $result->num_rows > 0) {
        // Fetch the rows and store them in the response array
        while ($row = $result->fetch_assoc()) {
            $response[] = $row;  // Each row will contain 'id' and 'name'
        }
    }
}

// Return the response as JSON
echo json_encode($response);

// Close the database connection
$connection->close();
?>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$api_url = 'https://example.com/api/provinces'; // Replace with actual API URL

$response = file_get_contents($api_url);

// Check if the API call was successful
if ($response === FALSE) {
    echo json_encode(['error' => 'Failed to retrieve provinces']);
    exit;
}

// Ensure valid JSON is returned
$json = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Invalid JSON returned']);
    exit;
}

echo $response;
?>

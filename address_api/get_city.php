<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$api_url = 'https://example.com/api/provinces'; // Replace with actual API URL

// Initialize cURL
$ch = curl_init($api_url);

// Set options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FAILONERROR, true); // Fail on HTTP error codes (e.g., 404, 500)

// Execute and capture the response
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo json_encode(['error' => 'cURL Error: ' . curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);

// Check if valid JSON is returned
$json = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Invalid JSON returned']);
    exit;
}

// Return the JSON response
echo $response;
?>

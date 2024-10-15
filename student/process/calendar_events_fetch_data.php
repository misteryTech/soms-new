<?php
header('Content-Type: application/json');

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "somsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch events
$sql = "SELECT id, title, description, date, image_path FROM event_schedule";
$result = $conn->query($sql);

$events = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'start' => $row['date'], // FullCalendar expects an ISO8601 date format
            'description' => $row['description'],
             'image_path' => $row['image_path']
        ];
    }
}

// Close the database connection
$conn->close();

// Output the events in JSON format
echo json_encode($events);
?>

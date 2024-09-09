<?php
include("connection.php");

$event_id = $_GET['event_id'];

$sql = "SELECT photo_path FROM event_photos WHERE event_id = '$event_id'";
$result = $connection->query($sql);

$photos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $photos[] = $row;
    }
}

echo json_encode(['photos' => $photos]);

$connection->close();
?>

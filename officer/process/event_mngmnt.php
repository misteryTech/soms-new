<?php
session_start();
include("../../include/connection.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $date = htmlspecialchars($_POST['date']);





if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$stmt = $connection->prepare("INSERT INTO management_events (title, description, date, time, location) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sss", $title, $description, $date, $time, $location);



if ($stmt->execute()) {
    $_SESSION['message'] = "New event added successfully";
    $_SESSION['message_type'] = "alert-success";
} else {
    $_SESSION['message'] = "Error: " . $stmt->error;
    $_SESSION['message_type'] = "alert-danger";
}


$stmt->close();
$connection->close();


header("Location: ../management_event_page.php");
exit();
}
?>

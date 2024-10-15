<?php
session_start();
include("../../include/connection.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $date = htmlspecialchars($_POST['date']);




$stmt = $conn->prepare("INSERT INTO events_management (title, description, date, time, location) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $title, $description, $date, $time, $location);




if ($stmt->execute()) {
    $_SESSION['message'] = "New event added successfully";
    $_SESSION['message_type'] = "alert-success";
} else {
    $_SESSION['message'] = "Error: " . $stmt->error;
    $_SESSION['message_type'] = "alert-danger";
}


$stmt->close();
$conn->close();


header("Location: ../management_event_page.php");
exit();
}
?>

<?php
session_start();
// Database connectionection parameters
include("../../include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $date = mysqli_real_escape_string($connection, $_POST['date']); // Match this to the form's input name
    $organization_id = mysqli_real_escape_string($connection, $_POST['organizer']); // Assuming this field exists in your form

    // Handling file upload
    $target_dir = "uploads/"; // Absolute path to the target directory
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Ensure the directory exists
    }

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a real image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['message'] = "File is not an image.";
        $_SESSION['message_type'] = "alert-danger";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['message'] = "Sorry, file already exists.";
        $_SESSION['message_type'] = "alert-danger";
        $uploadOk = 0;
    }

    // Check file size (500KB max size)
    if ($_FILES["image"]["size"] > 500000) {
        $_SESSION['message'] = "Sorry, your file is too large.";
        $_SESSION['message_type'] = "alert-danger";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $_SESSION['message_type'] = "alert-danger";
        $uploadOk = 0;
    }

    // Check if everything is ok to upload the file
    if ($uploadOk == 0) {
        $_SESSION['message'] = "Sorry, your file was not uploaded.";
        $_SESSION['message_type'] = "alert-danger";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            // Check connectionection
            if ($connection->connectionect_error) {
                die("Connectionection failed: " . $connection->connectionect_error);
            }

            $sql = "INSERT INTO event_schedule (title, description, date, image_path, org_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $connection->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("ssssi", $title, $description, $date, $target_file, $organization_id);

                if ($stmt->execute()) {
                    $_SESSION['message'] = "Event registered successfully";
                    $_SESSION['message_type'] = "alert-success";
                } else {
                    $_SESSION['message'] = "Error: " . $stmt->error;
                    $_SESSION['message_type'] = "alert-danger";
                }

                $stmt->close();
            } else {
                $_SESSION['message'] = "Error preparing statement: " . $connection->error;
                $_SESSION['message_type'] = "alert-danger";
            }

            $connection->close();
        } else {
            $_SESSION['message'] = "Sorry, there was an error uploading your file.";
            $_SESSION['message_type'] = "alert-danger";
        }
    }

    // Redirect back to the calendar page
    header("Location: ../set_calendar_event.php");
    exit();
}
?>

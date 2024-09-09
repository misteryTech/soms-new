<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['event_id'];

    // Check if files are uploaded
    if (isset($_FILES['event_photos']) && !empty($_FILES['event_photos']['name'][0])) {
        $upload_directory = 'events/';
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_count = count($_FILES['event_photos']['name']);

        for ($i = 0; $i < $file_count; $i++) {
            $file_name = $_FILES['event_photos']['name'][$i];
            $file_tmp = $_FILES['event_photos']['tmp_name'][$i];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $new_file_name = uniqid() . '.' . $file_ext;
            $target_file = $upload_directory . $new_file_name;

            // Check if the file extension is allowed
            if (in_array($file_ext, $allowed_extensions)) {
                // Move file to the uploads directory
                if (move_uploaded_file($file_tmp, $target_file)) {
                    // Insert into the database
                    $sql = "INSERT INTO event_photos (event_id, photo_path) VALUES ('$event_id', '$target_file')";
                    if ($connection->query($sql) === FALSE) {
                        echo "Error: " . $sql . "<br>" . $connection->error;
                    }
                } else {
                    echo "Failed to upload file: $file_name";
                }
            } else {
                echo "Invalid file type: $file_name";
            }
        }
    }

    $connection->close();

    // Redirect back to the events page or show a success message
    header("Location: ../event_gallery.php");
    exit();
}
?>

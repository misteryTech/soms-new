<?php
session_start();
include("../../include/connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $organization_name = mysqli_real_escape_string($connection, $_POST['organization_name']);
    $organization_type = mysqli_real_escape_string($connection, $_POST['organization_type']);
    $department = mysqli_real_escape_string($connection, $_POST['department']);
    $advisor_name = mysqli_real_escape_string($connection, $_POST['advisor_name']);
    $contact_email = mysqli_real_escape_string($connection, $_POST['contact_email']);

    
    $check_query = "SELECT * FROM organizations WHERE organization_name = '$organization_name'";
    $check_result = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error'] = "Organization already exists. Please choose a different name.";
    } else {
        

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
            $logo_name = $_FILES['logo']['name'];
            $logo_tmp_name = $_FILES['logo']['tmp_name'];
            $logo_size = $_FILES['logo']['size'];
            $logo_type = $_FILES['logo']['type'];

            $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
            $logo_ext = explode('.', $logo_name);
            $logo_actual_ext = strtolower(end($logo_ext));

            if (in_array($logo_actual_ext, $allowed_types) && $logo_size <= 5000000) {
                $logo_new_name = uniqid('', true) . "." . $logo_actual_ext;
                $logo_destination = '../uploads/' . $logo_new_name;

                if (move_uploaded_file($logo_tmp_name, $logo_destination)) {
                    
                    $query = "INSERT INTO organizations (organization_name, organization_type, department, advisor_name, contact_email, logo, created_at)
                              VALUES ('$organization_name', '$organization_type', '$department', '$advisor_name', '$contact_email', '$logo_new_name', NOW())";

                    if (mysqli_query($connection, $query)) {
                        $_SESSION['success'] = "Organization registered successfully!";
                    } else {
                        $_SESSION['error'] = "Error: " . mysqli_error($connection);
                    }
                } else {
                    $_SESSION['error'] = "Error uploading file. Please check file permissions.";
                }
            } else {
                $_SESSION['error'] = "Invalid file type or size. Please upload a file in JPG, JPEG, PNG, or GIF format and ensure it is under 5MB.";
            }
        } else {
            $_SESSION['error'] = "Error with file upload. Please try again.";
        }
    }

    mysqli_close($connection);

    header("Location: ../organizations_data.php");
    exit();
}
?>
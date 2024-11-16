<?php
session_start();
include("../../include/connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get form inputs and escape for security
    $organization_name = mysqli_real_escape_string($connection, $_POST['organization_name']);
    $organization_type = mysqli_real_escape_string($connection, $_POST['organization_type']);
    $department = mysqli_real_escape_string($connection, $_POST['department']);
    $advisor_name = mysqli_real_escape_string($connection, $_POST['advisor_name']);
    $contact_email = mysqli_real_escape_string($connection, $_POST['contact_email']);

    // Check if the organization already exists
    $check_query = "SELECT * FROM organizations WHERE organization_name = '$organization_name'";
    $check_result = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error'] = "Organization already exists. Please choose a different name.";
    } else {
        // Handle file uploads
        $logo_new_name = null;
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

                if (!move_uploaded_file($logo_tmp_name, $logo_destination)) {
                    $_SESSION['error'] = "Error uploading logo. Please check file permissions.";
                    header("Location: ../organizations_data.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "Invalid logo file type or size. Please upload a JPG, JPEG, PNG, or GIF under 5MB.";
                header("Location: ../organizations_data.php");
                exit();
            }
        }

        // Handle requirements file upload
        $requirements_new_name = null;
        if (isset($_FILES['requirements']) && $_FILES['requirements']['error'] == 0) {
            $requirements_name = $_FILES['requirements']['name'];
            $requirements_tmp_name = $_FILES['requirements']['tmp_name'];
            $requirements_size = $_FILES['requirements']['size'];

            $allowed_req_types = array('pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png');
            $req_ext = explode('.', $requirements_name);
            $req_actual_ext = strtolower(end($req_ext));

            if (in_array($req_actual_ext, $allowed_req_types) && $requirements_size <= 5000000) {
                $requirements_new_name = uniqid('', true) . "." . $req_actual_ext;
                $requirements_destination = '../uploads/' . $requirements_new_name;

                if (!move_uploaded_file($requirements_tmp_name, $requirements_destination)) {
                    $_SESSION['error'] = "Error uploading requirements file. Please check file permissions.";
                    header("Location: ../organizations_data.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "Invalid requirements file type or size. Please upload a PDF, DOC, DOCX, JPG, JPEG, or PNG under 5MB.";
                header("Location: ../organizations_data.php");
                exit();
            }
        }

        // Insert organization details into the database
        $query = "INSERT INTO organizations (organization_name, organization_type, department, advisor_name, contact_email, logo, requirements, created_at)
                  VALUES ('$organization_name', '$organization_type', '$department', '$advisor_name', '$contact_email', '$logo_new_name', '$requirements_new_name', NOW())";

        if (mysqli_query($connection, $query)) {
            $_SESSION['success'] = "Organization registered successfully!";

            // Get the last inserted document ID
            $document_id = mysqli_insert_id($connection);

            // Insert into document_log_tbl
            $log_query = "INSERT INTO document_log_tbl (document_id) VALUES ('$document_id')";
            if (!mysqli_query($connection, $log_query)) {
                $_SESSION['error'] = "Error logging document: " . mysqli_error($connection);
            }

        } else {
            $_SESSION['error'] = "Error: " . mysqli_error($connection);
        }
    }

    // Close connection and redirect
    mysqli_close($connection);
    header("Location: ../organizations_data.php");
    exit();
}
?>

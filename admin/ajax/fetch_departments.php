<?php
include('connection.php');

if (isset($_POST['course'])) {
    $course = mysqli_real_escape_string($connection, $_POST['course']);

    // Query to fetch departments based on the selected course
    $query = "SELECT * FROM department WHERE course = '$course'";
    $result = mysqli_query($connection, $query);

    // If there are departments, create options for the department dropdown
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $department = $row['department_name'];
            echo "<option value='$department'>$department</option>";
        }
    } else {
        echo "<option value=''>No departments found</option>";
    }
}
?>

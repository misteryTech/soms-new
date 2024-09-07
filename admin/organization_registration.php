<?php
include("admin_header.php");
session_start();
include("../include/connection.php");
?>

<body id="page-top" onload="generatePassword()">


    <div id="wrapper">

        <?php
        include("admin_sidebar.php");
        ?>


        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">

                <?php
                include("admin_topbar.php");
                ?>
<div class="container mt-5">
    <h2>Organization Registration Form</h2>

    <?php

    if (isset($_SESSION['success'])) {
        echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
        unset($_SESSION['error']);
    }
    ?>

<form action="process/org_reg.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
            <label for="organizationLogo">Organization Logo (OPTIONAL)</label>
            <input type="file" class="form-control-file" id="logo" name="logo">
            </div>


            <div class="form-group">
            <label for="organizationName">Organization Name</label>
            <input type="text" class="form-control" id="organization_name" name="organization_name" required>
        </div>
        <div class="form-group">
            <label for="organizationType">Organization Type</label>
            <select class="form-control" id="organization_type" name="organization_type" required>
            <option value="">Select Organization Type</option>
            <option value="Academic">Academic</option>
            <option value="Arts">Arts</option>
            <option value="Sports">Sports</option>
            <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
    <label for="department">Department</label>
    <select class="form-control" id="department" name="department" required>
        <option value="">Select Department</option>
        <?php
        include("../include/connection.php");
        $mysqli_query_department = mysqli_query($connection, "SELECT * FROM DEPARTMENT");

        while ($row = mysqli_fetch_assoc($mysqli_query_department)) {
            echo "<option value='" . $row['department_name'] . "'>" . $row['department_name'] . "</option>";
        }
        ?>
    </select>
</div>
        <div class="form-group">
            <label for="advisorName">Advisor Name</label>
            <input type="text" class="form-control" id="advisor_name" name="advisor_name" required>
        </div>
        <div class="form-group">
            <label for="contactEmail">Contact Email</label>
            <input type="email" class="form-control" id="contact_email" name="contact_email" required>
        </div>

        <div class="form-group">
            <label for="requirements">Organization Requirements</label>
            <input type="file" class="form-control-file" id="requirements" name="requirements" required>
            </div>


        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>




            </div>



        </div>


    </div>


    <?php
    include("admin_footer.php");
    ?>
    </div>

<?php
include("admin_header.php");
session_start();
include("../include/connection.php");

$query = "SELECT id, firstname, lastname FROM students";
$result = mysqli_query($connection, $query);


$orgQuery = "SELECT DISTINCT organization_name,id FROM organizations";
$orgResult = mysqli_query($connection, $orgQuery);


?>

<body id="page-top">


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
                    <h2 class="mb-4">Register for Student Organization</h2>
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo "<div class='alert {$_SESSION['message_type']}' role='alert'>{$_SESSION['message']}</div>";
                        unset($_SESSION['message']);
                        unset($_SESSION['message_type']);
                    }
                    ?>

<form action="process/officer_reg.php" method="POST" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="studentName">Student Name</label>
        <select class="form-control" id="student_name" name="student_name" required>
            <option value="" disabled selected>Select a student</option>
                                <?php

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['firstname'] . " " . $row['lastname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="orgName">Organization Name</label>
                            <select class="form-control" id="organization_name" name="organization_name" required>
                                <option value="" disabled selected>Select an organization</option>
                                <?php

                                while ($row = mysqli_fetch_assoc($orgResult)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['organization_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role">Position in Organization</label>
                            <select class="form-control" id="position" name="position" required>
                                <option value="" disabled selected>Select a position</option>
                                <option value="President">President</option>
                                <option value="Vice President">Executive Vice President</option>
                                <option value="Vice President">Vice President for Communications</option>
                                <option value="Vice President">Executive Vice fo Projects and Activities</option>
                                <option value="Vice President">Internal Vice President</option>
                                <option value="Vice President">External Vice President</option>
                                <option value="Vice President">Vice President</option>
                                <option value="Secretary">Secretary</option>
                                <option value="Treasurer">Treasurer</option>
                                <option value="Business Manager">Business Managers</option>
                                <option value="Auditor">Auditor</option>
                                <option value="CTE Governor">CTE Governor</option>
                                <option value="Vice Governor">Vice Governor</option>
                                <option value="P.I.O">P.I.O</option>
                                <option value="P.R.Os.">P.R.Os.</option>
                                <option value="1st Year Representative">1st Year Representative</option>
                                <option value="2nd Year Representative">2nd Year Representative</option>
                                <option value="3rd Year Representative">3rd Year Representative</option>
                                <option value="4th Year Representative">4th Year Representative</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="personalStatement">Personal Statement</label>
                            <textarea class="form-control" id="personalStatement" name="personalStatement" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Registration</button>

                    </form>
                </div>

            </div>


        </div>

    </div>




    <?php
    include("admin_footer.php");
    ?>

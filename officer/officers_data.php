<?php
include("user_header.php");
include("../include/connection.php");

// Fetch all student information from the database
$query = "
    SELECT S.*, O.position, org.organization_name

    FROM students AS S
    
    INNER JOIN officers AS O ON O.student_name = S.id
    LEFT JOIN organizations AS org ON org.id = o.organization_name

";
$result = mysqli_query($connection, $query);

// Fetch all organizations from the database
$orgQuery = "SELECT id, organization_name FROM organizations"; // Adjust the table name and column names as needed
$orgResult = mysqli_query($connection, $orgQuery);
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include("user_sidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include("user_topbar.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Student Information Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="studentTable" width="100%" cellspacing="0">
                                    <?php if (isset($_SESSION['success'])): ?>
                                        <div class="alert alert-success">
                                            <?php
                                            echo $_SESSION['success'];
                                            unset($_SESSION['success']);
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (isset($_SESSION['error'])): ?>
                                        <div class="alert alert-danger">
                                            <?php
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']);
                                            ?>
                                        </div>
                                    <?php endif; ?>

                                    <thead>
                                        <tr>

                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Organization</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        // Loop through each row of the result set
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            $name = $row["firstname"]." ".$row["lastname"];
                                            echo "<tr>";
                                            echo "<td>" . $row['student_id'] . "</td>";
                                            echo "<td>" . $name . "</td>";
                                            echo "<td>" . $row['position'] . "</td>";
                                            echo "<td>" . $row['organization_name'] ."</td>";
                                            echo "<td>";
                                            // View button
                                            echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#viewModal" . $row['id'] . "'>View</button>&nbsp;";
                                            // Edit button
                                            echo "<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#editModal" . $row['id'] . "'>Edit</button>&nbsp;";
                                            echo "</td>";
                                            echo "</tr>";

                                            // View Modal
                                            echo "<div class='modal fade' id='viewModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='viewModalLabel" . $row['id'] . "' aria-hidden='true'>";
                                            echo "<div class='modal-dialog' role='document'>";
                                            echo "<div class='modal-content'>";
                                            echo "<div class='modal-header'>";
                                            echo "<h5 class='modal-title' id='viewModalLabel" . $row['id'] . "'>View Student Information</h5>";
                                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                            echo "<span aria-hidden='true'>&times;</span>";
                                            echo "</button>";
                                            echo "</div>";
                                            echo "<div class='modal-body'>";
                                            // Display student and organization information
                                            echo "<p><strong>Name:</strong> " . $name . "</p>";
                                            echo "<p><strong>Position:</strong> " . $row['position'] . "</p>";
                                            echo "<p><strong>Organization:</strong> " . $row['organization_name'] . "</p>";
                                            echo "</div>";
                                            echo "<div class='modal-footer'>";
                                            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";

                                            // Edit Modal
                                            echo "<div class='modal fade' id='editModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='editModalLabel" . $row['id'] . "' aria-hidden='true'>";
                                            echo "<div class='modal-dialog' role='document'>";
                                            echo "<div class='modal-content'>";
                                            echo "<div class='modal-header'>";
                                            echo "<h5 class='modal-title' id='editModalLabel" . $row['id'] . "'>Edit Student Information</h5>";
                                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                            echo "<span aria-hidden='true'>&times;</span>";
                                            echo "</button>";
                                            echo "</div>";
                                            echo "<div class='modal-body'>";
                                            // Edit form
                                            echo "<form method='post' action='process/edit_officer.php'>";
                                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='name'>Name</label>";
                                            echo "<input type='text' class='form-control' id='name' name='name' value='" . $row['firstname'] . "' disabled>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='last_name'>Last Name</label>";
                                            echo "<input type='text' class='form-control' id='last_name' name='last_name' value='" . $row['lastname'] . "' disabled>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='role'>Role in Organization</label>";
                                            echo "<select class='form-control' id='role' name='role' required>";
                                            echo "<option value='' disabled>Select a role</option>";
                                            $roles = ["President", "Vice President", "Secretary", "Treasurer", "Member"];
                                            foreach ($roles as $role) {
                                                $selected = ($role == $row['position']) ? 'selected' : '';
                                                echo "<option value='$role' $selected>$role</option>";
                                            }
                                            echo "</select>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='organization_name'>Organization Name</label>";
                                            echo "<select class='form-control' id='organization_name' name='organization_name' required>";
                                            echo "<option value='' disabled>Select an organization</option>";
                                            // Populate the dropdown with organization names
                                            mysqli_data_seek($orgResult, 0); // Reset pointer to the start of the result set
                                            while ($orgRow = mysqli_fetch_assoc($orgResult)) {
                                                $selected = ($orgRow['organization_name'] == $row['organization_name']) ? 'selected' : '';
                                                echo "<option value='" . $orgRow['organization_name'] . "' $selected>" . $orgRow['organization_name'] . "</option>";
                                            }
                                            echo "</select>";
                                            echo "</div>";
                                            echo "<button type='submit' class='btn btn-primary'>Save changes</button>";
                                            echo "</form>";
                                            echo "</div>";
                                            echo "<div class='modal-footer'>";
                                            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                </div>
                        </div>
                    </div>

<tfoot>
                    <tr>
                        <td colspan="4" style="text-align: center;">
                            <a href="campus_org_reg.php" class="btn btn-primary">Add Officer</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>







        </div>

    </div>
    </div>

    <?php
    include("user_footer.php");
    ?>

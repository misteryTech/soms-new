<?php
include("user_header.php");
session_start();
include("../include/connection.php");
$session_id = $_SESSION['id'];

$query = "SELECT O.*, ORG.organization_name AS orgname , ORG.*


FROM officers AS O

INNER JOIN organizations AS ORG ON ORG.id = O.organization_name

WHERE student_name = '$session_id' ";
$result = mysqli_query($connection, $query);
?>

<body id="page-top">


    <div id="wrapper">

        <?php
        include("user_sidebar.php");
        ?>


        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">

                <?php
                include("user_topbar.php");
                ?>


                <div class="container-fluid">


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Organization Information Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="organizationTable" width="100%" cellspacing="0">
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
                                            <th>Organization Name</th>
                                            <th>Department</th>
                                            <th>Advisor Name</th>
                                            <th>Organization Registered</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['orgname'] . "</td>";
                                            echo "<td>" . $row['department'] . "</td>";
                                            echo "<td>" . $row['advisor_name'] . "</td>";
                                            echo "<td>" . $row['created_at'] . "</td>";
                                          
                                            echo "<td>";
                                            echo "<a href='view_org.php?id=" . $row['id'] . "'><i class='fas fa-eye text-success'></i></a> ";
                                            echo "<a href='#' data-toggle='modal' data-target='#editModal" . $row['id'] . "'><i class='fas fa-edit text-primary'></i></a> ";
                                            echo "<a href='#' data-toggle='modal' data-target='#deleteModal" . $row['id'] . "'><i class='fas fa-trash-alt text-danger'></i></a>";
                                            echo "</td>";
                                            echo "</tr>";


                                            echo "<div class='modal fade' id='editModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>";
                                            echo "<div class='modal-dialog' role='document'>";
                                            echo "<div class='modal-content'>";
                                            echo "<div class='modal-header'>";
                                            echo "<h5 class='modal-title' id='editModalLabel'>Edit Organization</h5>";
                                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                            echo "<span aria-hidden='true'>&times;</span>";
                                            echo "</button>";
                                            echo "</div>";
                                            echo "<div class='modal-body'>";

                                            echo "<form action='process/edit_org.php' method='POST'>";
                                            echo "<input type='hidden' name='organization_id' value='" . $row['id'] . "'>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='editOrganizationName'>Organization Name</label>";
                                            echo "<input type='text' class='form-control' id='editOrganizationName' name='edit_organization_name' value='" . $row['organization_name'] . "' required>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='editOrganizationType'>Organization Type</label>";
                                            echo "<select class='form-control' id='editOrganizationType' name='edit_organization_type' value'" . $row['organization_type'] . "' required>";
                                            echo "<option value='' disabled selected>Select Organization Type</option>";
                                            echo "<option value='Academic'" . ($row['organization_type'] == 'Academic' ? ' selected' : '') . ">Academic</option>";
                                            echo "<option value='Arts'" . ($row['organization_type'] == 'Arts' ? ' selected' : '') . ">Arts</option>";
                                            echo "<option value='Sports'" . ($row['organization_type'] == 'Sports' ? ' selected' : '') . ">Sports</option>";
                                            echo "<option value='Community Service'" . ($row['organization_type'] == 'Community Service' ? ' selected' : '') . ">Community Service</option>";
                                            echo "</select>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='editDepartment'>Department</label>";
                                            echo "<select class='form-control' id='editDepartment' name='edit_department' value'" . $row['department'] . "' required>";
                                            echo "<option value='' disabled selected>Select Department</option>";
                                            echo "<option value='INSTITUTE OF NURSING'" . ($row['department'] == 'INSTITUTE OF NURSIN' ? ' selected' : '') . ">INSTITUTE OF NURSING</option>";
                                            echo "<option value='COLLEGE OF TEACHER EDUCATION'" . ($row['department'] == 'COLEGE OF TEACHER EDUCATION' ? ' selected' : '') . ">COLLEGE OF TEACHER EDUCATION</option>";
                                            echo "<option value='COLLEGE OF ARTS SCIENCES AND TECHNOLOGY'" . ($row['department'] == 'COLLEGE OF ARTS SCIENCES AND TECHNOLOGY' ? ' selected' : '') . ">COLLEGE OF ARTS SCIENCES AND TECHNOLOGY</option>";
                                            echo "</select>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='editAdvisorName'>Advisor Name</label>";
                                            echo "<input type='text' class='form-control' id='editAdvisorName' name='edit_advisor_name' value='" . $row['advisor_name'] . "' required>";
                                            echo "</div>";
                                            echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
                                            echo "</form>";
                                            echo "</div>";
                                            echo "<div class='modal-footer'>";
                                            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";


                                            echo "<div class='modal fade' id='deleteModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel' aria-hidden='true'>";
                                            echo "<div class='modal-dialog' role='document'>";
                                            echo "<div class='modal-content'>";
                                            echo "<div class='modal-header'>";
                                            echo "<h5 class='modal-title' id='deleteModalLabel'>Delete Organization</h5>";
                                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                            echo "<span aria-hidden='true'>&times;</span>";
                                            echo "</button>";
                                            echo "</div>";
                                            echo "<div class='modal-body'>";
                                            echo "<p>Are you sure you want to delete this organization?</p>";
                                            echo "</div>";
                                            echo "<div class='modal-footer'>";
                                            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";

                                            echo "<form action='process/delete_org.php' method='POST'>";
                                            echo "<input type='hidden' name='organization_id' value='" . $row['id'] . "'>"; // Hidden field to pass organization ID
                                            echo "<button type='submit' class='btn btn-danger'>Delete</button>";
                                            echo "</form>";
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
                        <!-- <td colspan="4" style="text-align: center;">
                            <a href="organization_registration.php" class="btn btn-primary">Add Organization</a>
                        </td> -->
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


<script>

    $(document).ready(function () {
            $('#organizationTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "lengthChange": true,
                "info": true,
                "order": [[0, 'asc']] // Default sorting by first column (Name)
            });
        });
</script>
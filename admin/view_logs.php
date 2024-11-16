<?php
include("admin_header.php");
session_start();
include("../include/connection.php");


if (isset($_GET['id'])) {
    $organization_id = mysqli_real_escape_string($connection, $_GET['id']);

    // Fetch organization information
    $orgQuery = "SELECT * FROM organizations WHERE id = '$organization_id'";
    $orgResult = mysqli_query($connection, $orgQuery);
    $organization = mysqli_fetch_assoc($orgResult);

    // Fetch registered students for the organization ordered by role
    $query = "
        SELECT students.*, officers.position
        FROM students
        INNER JOIN officers ON students.id = officers.student_name
        WHERE officers.organization_name = '$organization_id'
        ORDER BY
            CASE
                WHEN officers.position = 'President' THEN 1
                WHEN officers.position = 'Vice President' THEN 2
                WHEN officers.position = 'Secretary' THEN 3
                WHEN officers.position = 'Treasurer' THEN 4
                ELSE 5
            END
    ";
    $result = mysqli_query($connection, $query);

    // Fetch all events associated with the organization
    $eventsQuery = "SELECT id, title, description, date, image_path FROM event_schedule WHERE org_id = '$organization_id'";
    $eventsResult = mysqli_query($connection, $eventsQuery);
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: admin_page.php");
    exit();
}



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


                <div class="container-fluid">


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Documents Activity Logss</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="studentTables" width="100%" cellspacing="0">
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
                                            <th>Student Id</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Year & Section</th>
                                            <th>Course</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM students";
                                        $result = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($result)) {


                                            $name = $row["firstname"]." ".$row["lastname"];
                                            $year_section = $row["year"]." - ".$row["section"];
                                            echo "<tr>";
                                            echo "<td>" . $row['student_id'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>" . $name . "</td>";
                                            echo "<td>" . $year_section . "</td>";
                                            echo "<td>" . $row['course'] . "</td>";
                                            echo "<td>";
                                            echo "<button class='btn btn-primary' data-toggle='modal' data-target='#editModal" . $row['id'] . "'>Edit</button> ";
                                            echo "<button class='btn btn-danger' data-toggle='modal' data-target='#deleteModal" . $row['id'] . "'>Delete</button>";
                                            echo "</td>";
                                            echo "</tr>";


                                            echo "<div class='modal fade' id='editModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>";
                                            echo "<div class='modal-dialog' role='document' style='max-width: 800px;'>";
                                            echo "<div class='modal-content'>";
                                            echo "<div class='modal-header'>";
                                            echo "<h5 class='modal-title' id='editModalLabel'>Edit Student</h5>";
                                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                            echo "<span aria-hidden='true'>&times;</span>";
                                            echo "</button>";
                                            echo "</div>";
                                            echo "<div class='modal-body'>";

                                            echo "<form action='process/edit_student_info.php' method='POST'>";
                                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                                            echo "<div class='form-group'>";

                                            echo " <div class='form-row'>";

                                            echo "<div class='col-md-6'>";
                                            echo "<label for='editUsername'>Student Id</label>";
                                            echo "<input type='text' class='form-control' id='editStudentid' name='edit_id' value='" . $row['student_id'] . "' required>";
                                            echo "</div>";


                                            echo "<div class='col-md-6'>";
                                            echo "<label for='editUsername'>Username</label>";
                                            echo "<input type='text' class='form-control' id='editUsername' name='edit_username' value='" . $row['username'] . "' required>";
                                            echo "</div>";
                                            echo "<div class='col-md-4'>";
                                            echo "<label for='editLastName'>Last Name</label>";
                                            echo "<input type='text' class='form-control' id='editLastName' name='edit_lastname' value='" . $row['lastname'] . "' required>";
                                            echo "</div>";
                                            echo "<div class='col-md-4'>";
                                            echo "<label for='editFirstName'>First Name</label>";
                                            echo "<input type='text' class='form-control' id='editFirstName' name='edit_firstname' value='" . $row['firstname'] . "' required>";
                                            echo "</div>";
                                            echo "<div class='col-md-4'>";
                                            echo "<label for='editMiddleName'>Middle Name</label>";
                                            echo "<input type='text' class='form-control' id='editMiddleName' name='edit_middlename' value='" . $row['middlename'] . "' required>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo " <div class='form-row'>";
                                            echo "<div class='col-md-4'>";
                                            echo "<label for='editCourse'>Course</label>";
                                            echo "<select class='form-control' id='editCourse' name='edit_course' required>";
                                            echo "<option value='' disabled selected>Select Course</option>";
                                            echo "<option value='AB English Language'" . ($row['course'] == 'AB English Language' ? ' selected' : '') . ">AB English Language</option>";
                                            echo "<option value='Bachelor of Elementary Education'" . ($row['course'] == 'Bachelor of Elementary Education' ? ' selected' : '') . ">Bachelor of Elementary Education</option>";
                                            echo "<option value='Bachelor of Secondary Education'" . ($row['course'] == 'Bachelor of Secondary Education' ? ' selected' : '') . ">Bachelor of Secondary Education</option>";
                                            echo "<option value='Bachelor of Technology and Livelihood Education'" . ($row['course'] == 'Bachelor of Technology and Livelihood Education' ? ' selected' : '') . ">Business Administration</option>";
                                            echo "<option value='Bachelor of Physical Education'" . ($row['course'] == 'Bachelor of Physical Education' ? ' selected' : '') . ">Bachelor of Physical Education</option>";
                                            echo "<option value='Bachelor of Public Administration'" . ($row['course'] == 'Bachelor of Public Administration' ? ' selected' : '') . ">Bachelor of Public Administration</option>";
                                            echo "<option value='Bachelor of Early Childhood Education'" . ($row['course'] == 'Bachelor of Early Childhood Education' ? ' selected' : '') . ">Bachelor of Early Childhood Education</ption>";
                                            echo "<option value='BS Business Administration'" . ($row['course'] == 'BS Business Administration' ? ' selected' : '') . ">BS Business Administration</option>";
                                            echo "<option value='BS Nursing'" . ($row['course'] == 'BS Nursing' ? ' selected' : '') . ">BS Nursing</option>";
                                            echo "<option value='BS Information Technology'" . ($row['course'] == 'BS Information Technology' ? ' selected' : '') . ">BS Information Technology</option>";
                                            echo "</select>";
                                            echo "</div>";
                                            echo "<div class='col-md-4'>";
                                            echo "<label for='editYear'>Year</label>";
                                            echo "<select class='form-control' id='editYear' name='edit_year' required>";
                                            echo "<option value='' disabled selected>Select Course</option>";
                                            echo "<option value=I" . ($row['year'] == 'I' ? ' selected' : '') . ">I</option>";
                                            echo "<option value=II" . ($row['year'] == 'II' ? ' selected' : '') . ">II</option>";
                                            echo "<option value=III" . ($row['year'] == 'III' ? ' selected' : '') . ">III</option>";
                                            echo "<option value=IV" . ($row['year'] == 'IV' ? ' selected' : '') . ">IV</option>";
                                            echo "</select>";
                                            echo "</div>";
                                            echo "<div class='col-md-4'>";
                                            echo "<label for='editSection'>Section</label>";
                                            echo "<select class='form-control' id='editSection' name='edit_section' required>";
                                            echo "<option value='' disabled selected>Select Section</option>";
                                            echo "<option value=1" . ($row['section'] == '1' ? ' selected' : '') . ">1</option>";
                                            echo "<option value=2" . ($row['section'] == '2' ? ' selected' : '') . ">2</option>";
                                            echo "<option value=3" . ($row['section'] == '3' ? ' selected' : '') . ">3</option>";
                                            echo "</select>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo " <div class='form-row'>";
                                            echo "<div class='col-md-3'>";
                                            echo "<label for='editGender'>Gender</label>";
                                            echo "<select class='form-control' id='editGender' name='edit_gender' required>";
                                            echo "<option value='' disabled selected>Select Gender</option>";
                                            echo "<option value='Male'" . ($row['gender'] == 'Male' ? ' selected' : '') . ">Male</option>";
                                            echo "<option value='Female'" . ($row['gender'] == 'Female' ? ' selected' : '') . ">Female</option>";
                                            echo "</select>";
                                            echo "</div>";
                                            echo "<div class='col-md-3'>";
                                            echo "<label for='editDob'>Date of Birth</label>";
                                            echo "<input type='date' class='form-control' id='editDob' name='edit_dob' value='" . $row['dob'] . "' required>";
                                            echo "</div>";
                                            echo "<div class='col-md-2'>";
                                            echo "<label for='editAge'>Age</label>";
                                            echo "<input type='number' class='form-control' id='editAge' name='edit_age' value='" . $row['age'] . "' required>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo " <div class='form-row'>";
                                            echo "<div class='col-md-6'>";
                                            echo "<label for='editEmail'>Email</label>";
                                            echo "<input type='email' class='form-control' id='editEmail' name='edit_email' value='" . $row['email'] . "' required>";
                                            echo "</div>";
                                            echo "<div class='col-md-6'>";
                                            echo "<label for='editPhone'>Phone Number</label>";
                                            echo "<input type='text' class='form-control' id='editPhone' name='edit_phone' value='" . $row['phone'] . "' required>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo " <div class='form-row'>";
                                            echo "<div class='col-md-3'>";
                                            echo "<label for='editStreet'>Street</label>";
                                            echo "<input type='text' class='form-control' id='editStreet' name='edit_street' value='" . $row['street'] . "' required>";
                                            echo "</div>";
                                            echo "<div class='col-md-3'>";
                                            echo "<label for='editBarangay'>Barangay</label>";
                                            echo "<input type='text' class='form-control' id='editBarangay' name='edit_barangay' value='" . $row['barangay'] . "' required>";
                                            echo "</div>";
                                            echo "<div class='col-md-3'>";
                                            echo "<label for='editMunicipality'>Municipality</label>";
                                            echo "<input type='text' class='form-control' id='editMunicipality' name='edit_municipality' value='" . $row['municipality'] . "' required>";
                                            echo "</div>";
                                            echo "<div class='col-md-3'>";
                                            echo "<label for='editProvince'>Province</label>";
                                            echo "<input type='text' class='form-control' id='editProvince' name='edit_province' value='" . $row['province'] . "' required>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";


                                            echo "<div class='modal-footer'>";
                                            echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
                                            echo "</form>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";


                                            echo "<div class='modal fade' id='deleteModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel' aria-hidden='true'>";
                                            echo "<div class='modal-dialog' role='document'>";
                                            echo "<div class='modal-content'>";
                                            echo "<div class='modal-header'>";
                                            echo "<h5 class='modal-title' id='deleteModalLabel'>Delete Student</h5>";
                                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                            echo "<span aria-hidden='true'>&times;</span>";
                                            echo "</button>";
                                            echo "</div>";
                                            echo "<div class='modal-body'>";
                                            echo "<p>Are you sure you want to delete this student?</p>";
                                            echo "</div>";
                                            echo "<div class='modal-footer'>";
                                            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";

                                            echo "<form action='process/delete_student.php' method='POST'>";
                                            echo "<input type='hidden' name='student_id' value='" . $row['id'] . "'>"; // Hidden field to pass student ID
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
                        <td colspan="4" style="text-align: center;">
                            <a href="student_registration.php" class="btn btn-primary">Add Student</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>







        </div>

    </div>
    </div>

    <?php
    include("admin_footer.php");
    ?>


    <script>
        $(document).ready(function () {
            $('#studentTables').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "lengthChange": true,
                "info": true,
                "order": [[2, 'asc']] // Default sorting by first column (Name)
            });
        });
    </script>
</body>
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
                        <div class="form-row">
                            <div class="col-md-4">
                                    <label for="course">Course</label>
                                    <select class="form-control" id="course" name="course" required>
                                    <option value="" disabled selected>Select a course</option>
                                    <option value="ABEL">AB English Language</option>
                                      <option value="BEED">Bachelor of Elementary Education</option>
                                      <option value="BSED">Bachelor of Secondary Education</option>
                                      <option value="BTLED">Bachelor of Technology and Livelihood Education</option>
                                      <option value="BPED">Bachelor of Physical Education</option>
                                      <option value="BPA">Bachelor of Public Administration</option>
                                      <option value="BECED">Bachelor of Early Childhood Education</option>
                                      <option value="BSBA">BS Business Administration</option>
                                      <option value="BSN">BS Nursing</option>
                                      <option value="BSIT">BS Information Technology</option>
                                  </select>
                                </div>
                                <div class="col-md-4">
                            <label for="studentYear">Year</label>
                            <select class="form-control" id="student_year" name="student_year" required>
                            <option value="" disabled selected>Select year</option>
                                <option value="9">1st</option>
                                <option value="10">2nd</option>
                                <option value="11">3rd</option>
                                <option value="12">4th</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="col-md-4">
                            <label for="officerEmail">Email</label>
                            <input type="email" class="form-control" id="officer_email" name="officer_email" required>
                        </div>
                        <div class="col-md-4">
                            <label for="officerPhone">Phone Number</label>
                            <input type="text" class="form-control" id="officer_phone" name="officer_phone" required>
                        </div>
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

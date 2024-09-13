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

                <div class="container mt-5 mb-5">
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


                    <h2 style="text-align: center;">Student Registration Form</h2>

                    <button type="button" class="btn btn-gray" onclick="closeForm()" style="position: absolute; top: 100px; left: 250px;">
        <i class="fas fa-times"></i>
    </button>
                    <form action="process/student_reg.php" method="POST">

                        <div class="form-group">
                           <h5 style="text-align: center;">Account</h5>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="studentId">Student ID</label>
                                    <input type="text" class="form-control" id="studentId" name="student_id" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" required readonly>
                                </div>
                            </div>
                                </div>
                                <div class="form-group">
                                <h5 style="text-align: center;">Personal Information</h5>
                                <div class="form-row">
                                <div class="col-md-4">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"  required>
                        </div>
                            <div class="col-md-4">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                        <div class="col-md-4">
                            <label for="middlename">Middlename</label>
                            <input type="text" class="form-control" id="middlename" name="middlename" required>
                        </div>
                        </div>
                        <div class="form-row">
                                <div class="col-md-3">
                                <?php

                                    $mysql_query = "SELECT * FROM  department  GROUP BY  course";
                                    $result = mysqli_query($connection, $mysql_query);
                                ?>
                                <label for="course">Course</label>
                                <select class="form-control" id="course" name="course" required onchange="fetchDepartments(this.value)">
                                    <option value="" disabled selected>Select a course</option>
                                    <?php

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $course = $row['course'];
                                            echo "<option value='$course'>$course</option>";
                                        }
                                    ?>
                                </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="department">Department</label>
                                    <select class="form-control" id="department" name="department" required>
                                    <option value="" disabled selected>Select a Department</option>

                                    </select>
                                </div>


                                <div class="col-md-3">
                                    <label for="year">Year</label>
                                    <select class="form-control" id="year" name="year" required>
                                    <option value="" disabled selected>Select a year</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="section">Section</label>
                                    <select class="form-control" id="section" name="section" required>
                                    <option value="" disabled selected>Select a section</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    </select>
                                </div>



                                </div>
                        <div class="form-row">
                        <div class="col-md-4">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled selected>Select a gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="dob">Birthdate</label>
                            <input type="date" class="form-control" id="dob" name="dob" onchange="calculateAge()"  required>
                        </div>
                        <div class="col-md-1">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name="age" required>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                           <h5 style="text-align: center;">Contact Information</h5>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" class="form-control" id="phone" name="phone" required>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <h5 style="text-align: center;">Address</h5>
                        <div class="form-row">

                        <div class="col-md-4">
                                    <label for="province">Province</label>
                                    <select class="form-control" id="province" name="province" required onchange="updateAddressinfo()">
                                        <option value="">Select Province</option>
                                        <option value="1">Abra</option>
                                        <option value="2">Apayao</option>
                                        <option value="3">Pangasinan</option>
                                    </select>
                        </div>


                            <div class="col-md-4">
                                <label for="municipality">Municipality</label>
                                <select class="form-control" id="municipality" name="municipality" required onchange="fetchBarangays(this.value)">
                                    <option value="">Select Municipality</option>
                                </select>
                            </div>


                            <div class="col-md-4">
                                <label for="barangay">Barangay</label>
                                <select class="form-control" id="barangay" name="barangay" required>
                                    <option value="">Select Barangay</option>
                                </select>
                            </div>


                            <div class="col-md-12">
                                <label for="street">Street</label>
                                <input type="text" class="form-control" id="street" name="street" required>
                            </div>


                        </div>
                        </div>
                       </div>
                       </div>


                        <button type="submit" class="btn btn-success d-block mx-auto">Register</button>
                    </form>
                </div>








            </div>



        </div>


    </div>


    <?php
    include("admin_footer.php");
    ?>
    </div>


    <script>
                  function updateAddressinfo() {
    var provinceId = document.getElementById('province').value;

    $.ajax({
        url: 'ajax/check_province.php',
        type: 'POST',
        data: { provinceId: provinceId },
        dataType: 'json',
        success: function(response) {
            // Clear the existing options in the municipality dropdown
            var municipalityDropdown = document.getElementById('municipality');
            municipalityDropdown.innerHTML = '<option value="">Select Municipality</option>';

            // Loop through the response and create new option elements
            response.forEach(function(municipality) {
                var option = document.createElement('option');
                option.value = municipality.municipality;
                option.textContent = municipality.municipality;
                municipalityDropdown.appendChild(option);
            });
        },
        error: function(xhr, status, error) {
            console.error("An error occurred: " + error);
        }
    });
}


function fetchBarangays(municipality) {
            $.ajax({
                url: 'ajax/fetch_barangay.php',
                type: 'POST',
                data: { municipality: municipality },
                dataType: 'json',
                success: function(response) {
                    var barangayDropdown = document.getElementById('barangay');
                    barangayDropdown.innerHTML = '<option value="">Select Barangay</option>';
                    response.forEach(function(barangay) {
                        var option = document.createElement('option');
                        option.value = barangay.barangay;
                        option.textContent = barangay.barangay;
                        barangayDropdown.appendChild(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("An error occurred: " + error);
                }
            });
        }










 function fetchDepartments(course) {
        $.ajax({
            url: 'ajax/fetch_departments.php',
            method: 'POST',
            data: { course: course },
            success: function(response) {

                $('#department').html(response);
            }
        });
    }
    </script>
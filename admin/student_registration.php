<?php
include("admin_header.php");
session_start();
include("../include/connection.php");
?>


<style>
    h2{
        font-size: 35px;
        color: black;
}
</style>

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

                            <div class="col-md-1">
                                <label for="studentId">Preffix</label>
                 
                                                
                                <input type="text" class="form-control" id="preffix" name="preffix" aria-describedby="bgu-prefix" 
                                pattern="^[0-9]+$" placeholder="19" required>
                
                            </div>

                            
                            <div class="col-md-4">
                                <label for="studentId">Student ID</label>
                                <span id="bgu-prefix">BGU</span>

                                <input type="text" class="form-control" id="studentId" name="student_id" aria-describedby="bgu-prefix" 
                              placeholder="123456" required>
                                <small class="form-text text-muted">Student ID must start with "BGU" followed by numbers.</small>
                            </div>

                                <div class="col-md-3">
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
                                <h2 style="text-align: center;">Personal Information</h2>
                                <div class="form-row">
                        
                            <div class="col-md-4">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                        <div class="col-md-4">
                            <label for="middlename">Middlename</label>
                            <input type="text" class="form-control" id="middlename" name="middlename" required>
                        </div>
                        <div class="col-md-4">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" id="lastname" name="lastname"  required>
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

                                <?php

$mysql_query = "SELECT * FROM  year  GROUP BY  year";
$result = mysqli_query($connection, $mysql_query);
?>


                                    <label for="year">Year</label>
                                    <select class="form-control" id="year" name="year" required>
                                    <option value="" disabled selected>Select a year</option>
                                    <?php

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $year = $row['year'];
                                            echo "<option value='$year'>$year</option>";
                                        }
                                    ?>
                                </select>
                                    </select>
                                </div>

                                <?php
                                    $mysqli_query_department = "SELECT * FROM DEPARTMENT";
                                    $mysqli_result_dept = mysqli_query($connection, $mysqli_query_department);

                                    


                                ?>
                                <div class="col-md-3">
                                    <label for="section">Section</label>

                                    <?php

$mysql_query = "SELECT * FROM  section  GROUP BY  section";
$result = mysqli_query($connection, $mysql_query);
?>

                                   <select class="form-control" id="section" name="section" required>
                                    <option value="" disabled selected>Select a section</option>
                                    <?php

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $section = $row['section'];
                                            echo "<option value='$section'>$section</option>";
                                        }
                                    ?>
                                </select>


                                </div>



                                </div>
                        <div class="form-row">
                        <div class="col-md-4">
                            <label for="gender">Sex</label>
                            <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled selected>Select a gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
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
                           <div class="col-md-6">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" onkeyup="checkEmail()" required >
    <span id="checkavailability" style="display: block; margin-top: 5px;"></span>

</div>
<div class="col-md-4">
    <label for="phone">Phone Number</label>
    <input type="text" class="form-control" id="phone" name="phone" pattern="^[0-9]{11}$" maxlength="11" required>
    <small class="form-text text-muted">Phone number must be 11 digits.</small>
</div>

                            </div>
                            </div>
                            <div class="form-group">
                            <h2 style="text-align: center;">Address</h2>
                        <div class="form-row">
                        

                        <div class="col-md-12">
                        <label for="region">Select Region:</label>
                                 <select class="form-control" name="region" id="region" onchange="loadProvinces(this.value)">
                                     <option value="">Select Region</option>
                                     <option value="NCR">National Capital Region (NCR)</option>
                                     <option value="CAR">Cordillera Administrative Region (CAR)</option>
                                     <option value="Region I">Ilocos Region</option>
                                     <option value="Region II">Cagayan Valley</option>
                                     <option value="Region III">Central Luzon</option>
                                     <option value="Region IV-A">CALABARZON</option>
                                     <option value="Region IV-B">MIMAROPA</option>
                                     <option value="Region V">Bicol Region</option>
                                     <option value="Region VI">Western Visayas</option>
                                     <option value="Region VII">Central Visayas</option>
                                     <option value="Region VIII">Eastern Visayas</option>
                                     <option value="Region IX">Zamboanga Peninsula</option>
                                     <option value="Region X">Northern Mindanao</option>
                                     <option value="Region XI">Davao Region</option>
                                     <option value="Region XII">SOCCSKSARGEN</option>
                                     <option value="Region XIII">Caraga</option>
                                     <option value="BARMM">Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)</option>
                                 </select>


                        </div>
                        <div class="col-md-4">
                                    <label for="province">Province</label>
                                    <select class="form-control" id="province" name="province" required onchange="loadCities(this.value)">
                                        <option value="">Select Province</option>
                             
                                    </select>
                        </div>


                            <div class="col-md-4">
                                <label for="municipality">Municipality</label>
                                <select class="form-control" id="city" name="city" required onchange="loadMunicipalities(this.value)">
                                    <option value="">Select Municipality</option>
                                </select>
                            </div>


                            <div class="col-md-4">
                                <!-- Municipality Dropdown -->
                                <label for="municipality">Select Barangay:</label>
                                <select class="form-control" name="barangay" id="barangay">
                                    <option value="">Select Barangay</option>
                                    <!-- Options populated by JavaScript -->
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
    <script src="address_js/dropdown.js"></script>

    <script>





document.getElementById("phone").addEventListener("input", function (e) {
        // Remove any non-numeric characters
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    document.getElementById("studentId").addEventListener("focus", function () {
        // Check if the input does not already start with "BGU"
        if (!this.value.startsWith("BGU")) {
            this.value = "-BGU-";
        }
    });


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


    function checkEmail() {
        var email = document.getElementById('email').value;
        
        // Ensure the organization name is not empty before making the AJAX request
        if (email.trim() === "") {
            document.getElementById('checkavailability').textContent = 'Please enter an email.';
            document.querySelector('button[type="submit"]').disabled = true;
            return;
        }

        $.ajax({
            url: 'ajax/check_email.php', // Ensure the URL is correct
            type: 'POST',
            data: { email: email },
            success: function(response) {
                var availabilitySpan = document.getElementById('checkavailability');

                if (response === 'exists') {
                    availabilitySpan.textContent = 'This email name already exists.';
                    availabilitySpan.style.color = 'red';
                    document.querySelector('button[type="submit"]').disabled = true; // Disable submit button
                } else if (response === 'available') {
                    availabilitySpan.textContent = 'This email name is available.';
                    availabilitySpan.style.color = 'green';
                    document.querySelector('button[type="submit"]').disabled = false; // Enable submit button
                } else {
                    console.error('Unexpected response: ', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error: ' + error);
            }
        });
    }


    </script>
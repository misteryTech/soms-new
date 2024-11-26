<?php
include("admin_header.php");
session_start();
include("../include/connection.php");
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

                    <h2 style="text-align: center;">Year Registration Form</h2>

                    <form action="process/year_registration.php" method="POST">

                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-md-6">
                                    <label for="year">Year Name</label>
                                    <input type="text" class="form-control" id="year" name="year" onkeyup="checkyear()" required>
                                    <span id="checkavailability" style="display: block; margin-top: 5px;"></span>
                                </div>

                            </div>
                        </div>

                        <button type="submit" id="registerButton" class="btn btn-success d-block mx-auto">Register year</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <?php
    include("admin_footer.php");
    ?>

    <script>
        function checkyear() {
            var year = document.getElementById('year').value;

            $.ajax({
                url: 'ajax/check_year.php',
                type: 'POST',
                data: { year: year },
                success: function(response) {
                    var availabilitySpan = document.getElementById('checkavailability');

                    if (response === 'exists') {
                        availabilitySpan.textContent = 'This year already exists.';
                        availabilitySpan.style.color = 'red';
                        document.getElementById('registerButton').disabled = true;
                    } else {
                        availabilitySpan.textContent = 'This year is available.';
                        availabilitySpan.style.color = 'green';
                        document.getElementById('registerButton').disabled = false;
                    }
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred: ' + error);
                }
            });
        }

        document.getElementById('year').addEventListener('blur', checkyear);
    </script>
</body>

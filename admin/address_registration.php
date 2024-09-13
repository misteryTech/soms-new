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

                    <h2 style="text-align: center;">Address Registration Form</h2>

                    <form action="process/address_registration.php" method="POST">

                        <div class="form-group"></div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="province">Province</label>
                                    <select class="form-control" id="province" name="province" required>
                                        <option value="">Select Province</option>
                                        <option value="1">Abra</option>
                                        <option value="2">Apayao</option>
                                        <option value="3">Pangasinan</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="municipality">Municipality</label>
                                    <input type="text" class="form-control" id="municipality" name="municipality"  required>
                                    <span id="checkavailability" style="display: block; margin-top: 5px;"></span>
                                </div>

                                <div class="col-md-4">
                                    <label for="barangay">Barangay</label>
                                    <input type="text" class="form-control" id="barangay" name="barangay" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="registerButton" class="btn btn-success d-block mx-auto">Register</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <?php
    include("admin_footer.php");
    ?>


</body>

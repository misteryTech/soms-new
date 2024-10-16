<?php 
include('admin_header.php');
include('../include/connection.php'); // Include the database connection here
?>

<body id="page-top">
    <div id="wrapper">
        <?php 
        include('admin_sidebar.php');
        ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php 
                include('admin_topbar.php');
                ?>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-center">
                        <h1 class="h3 mb-0 text-gray-800">Colleges</h1>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <?php
                        // Fetch departments from the database
                        $query = "SELECT id, department_name FROM department";
                        $result = $connection->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                <div class="col-md-10 mb-4">
                                    <div class="card border-left-primary shadow h-100 card-custom">
                                        <div class="card-body text-center">
                                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-5">
                                                <a href="view_organization.php?department_id=' . $row['id'] . '" class="text-decoration-none text-primary">
                                                    ' . htmlspecialchars($row['department_name']) . '
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100"></div>';
                            }
                        } else {
                            echo '<div class="col-md-10 mb-4 text-center">No departments found.</div>';
                        }
                        ?>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-6 mb-4"></div>
                        <div class="col-lg-6 mb-4"></div>
                    </div>
                </div>
            </div>

            <?php 
            include('admin_footer.php');
            ?>
        </div>
    </div>
</body>

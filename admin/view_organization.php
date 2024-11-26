<?php 
include('admin_header.php');
include('../include/connection.php'); // Include the database connection here
?>

<style>
    .card-custom {
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card-custom:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease;
}



</style>

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
                        <h1 class="h3 mb-0 text-gray-800">Registered Organizations</h1>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <?php
                        // Get department_id from URL
                        $department_id = isset($_GET['department_id']) ? intval($_GET['department_id']) : 0;

                        if ($department_id > 0) {
                            // Fetch department name
                            $deptQuery = "SELECT department_name FROM department WHERE id = $department_id";
                            $deptResult = $connection->query($deptQuery);
                            $department_name = ($deptResult->num_rows > 0) ? $deptResult->fetch_assoc()['department_name'] : 'Unknown Department';

                            echo '<div class="col-md-10 mb-4 text-center">';
                            echo '<h2 class="text-primary mb-4">' . htmlspecialchars($department_name) . '</h2>';
                            echo '</div>';

                            // Fetch registered organizations for the selected department
                            $query = "SELECT id, organization_name FROM organizations WHERE department = '$department_name'";
                            $result = $connection->query($query);

                            if ($result->num_rows > 0) {
                                // Display organizations in cards
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                    <div class="col-md-4 mb-4">
                                        <div class="card border-left-primary shadow h-100">
                                            <div class="card-body text-center">
                                                <a href="view_members.php?org_id=' . $row['id'] . '" class="text-decoration-none text-primary">
                                                    <h5>' . htmlspecialchars($row['organization_name']) . '</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                }
                            } else {
                                echo '<div class="col-md-10 mb-4 text-center">No organizations found for this department.</div>';
                            }
                        } else {
                            echo '<div class="col-md-10 mb-4 text-center">Invalid department selected.</div>';
                        }
                        ?>
                    </div>

                    <!-- Optional Additional Row for content -->
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

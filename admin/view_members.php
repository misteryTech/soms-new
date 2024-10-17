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
                        <h1 class="h3 mb-0 text-gray-800">Registered Organizations</h1>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <?php
                        // Get student_id from URL
                        $org_id = isset($_GET['org_id']) ? intval($_GET['org_id']) : 0;

                        if ($org_id > 0) {
                            // Fetch student name
                            $deptQuery = "SELECT O.*,ORG.*
                            
                            FROM officers AS O
                            INNER JOIN organizations AS ORG ON ORG.id = O.organization_name
                            
                            WHERE O.organization_name = $org_id";
                            
                            $deptResult = $connection->query($deptQuery);
                            $student_name = ($deptResult->num_rows > 0) ? $deptResult->fetch_assoc()['organization_name'] : 'Unknown student';
                       

                            echo '<div class="col-md-10 mb-4 text-center">';
                            echo '<h2 class="text-primary mb-4">' . htmlspecialchars($student_name) . '</h2>';
                 
                            echo '</div>';
                            echo '<div class="w-100"></div>';

                            // Fetch registered organizations for the selected student
                            $query = "SELECT O.*,S.*

                             FROM officers  O
                            INNER JOIN students AS S ON S.id=O.student_name
                             
                             WHERE organization_name = '$org_id'";
                            $result = $connection->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                    <div class="col-md-10 mb-4">
                                        <div class="card border-left-primary shadow h-100 card-custom">
                                            <div class="card-body text-center">
                                                <h1> <a href="view_members.php?student_id=' . $row['id'] . '" class="text-decoration-none text-primary">
                                                    ' . htmlspecialchars($row['firstname'].' '. $row['lastname']) . '
                                                </a>
                                                </h1>
                                                   <h5>'.$row['position'].'</h5>
                                                <h4> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100"></div>';
                                }
                            } else {
                                echo '<div class="col-md-10 mb-4 text-center">No organizations found for this student.</div>';
                            }
                        } else {
                            echo '<div class="col-md-10 mb-4 text-center">Invalid student selected.</div>';
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

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

    // Fetch events associated with the organization including the image path
    $eventsQuery = "SELECT id, title, description, date, image_path FROM events WHERE organization_id = '$organization_id'";
    $eventsResult = mysqli_query($connection, $eventsQuery);
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: admin_page.php");
    exit();
}
?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include("admin_sidebar.php");
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include("admin_topbar.php");
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Organization Information</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <?php if (!empty($organization['logo'])): ?>
                                    <div class="text-center mb-3">
                                        <img src="uploads/<?php echo $organization['logo']; ?>" class="img-fluid rounded" alt="Organization Photo" style="max-width: 250px;">
                                    </div>
                                <?php else: ?>
                                    <div class="text-center mb-3">
                                        <p>No photo available.</p>
                                    </div>
                                <?php endif; ?>

        
                                <div class="text-center mb-3">
    <div class="row justify-content-end">
        <div class="col-auto">
            <?php
            $newPageUrl = "path/to/your/new/page.php"; // Change this to the URL of the new page
            echo "<a href='$newPageUrl' target='_blank'>";
            echo "<i class='fas fa-gavel'></i> Constitutions by Law";
            echo "</a>";
            ?>
        </div>
    </div>
</div>
    </div>
</div>

                               
                                <tr>
                                    <th>Organization Name</th>
                                    <td><?php echo $organization['organization_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td><?php echo $organization['department']; ?></td>
                                </tr>
                                <tr>
                                    <th>Advisor Name</th>
                                    <td><?php echo $organization['advisor_name']; ?></td>
                                </tr>

                            </table>

                            <hr>

                            <h3>OFFICERS</h3>

                            <table class="table table-bordered" id="studentTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                    <th class="text-center bg-light">POSITION</th>
                                    <th class="text-center bg-light">NAME</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    // Loop through each row of the result set
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $name = $row["firstname"]." ".$row["lastname"];
                                        echo "<tr>";
                                        echo "<td class='text-center'>" . $row['role'] . "</td>";
                                        echo "<td class='text-center'>" . $name . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <br>

                            <hr>

                            <h3>ACTIVITIES</h3>


                            <?php
                            if (mysqli_num_rows($eventsResult) > 0) {
                                echo "<div class='row'>";
                                while ($event = mysqli_fetch_assoc($eventsResult)) {
                                    echo "<div class='col-md-4 mb-4'>";
                                    echo "<div class='card'>";
                                    echo "<img class='card-img-top' src='{$event['image_path']}' alt='Event Image'>";
                                    echo "<div class='card-body'>";
                                    echo "<h5 class='card-title'>{$event['title']}</h5>";
                                    echo "<p class='card-text'>{$event['description']}</p>";
                                    echo "<p class='card-text'>{$event['date']}</p>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                echo "</div>";
                            } else {
                                echo "<p>No events found for this organization.</p>";
                            }
                            ?>

                            <a href="organizations_data.php" class="btn btn-secondary">Back</a>
                        </div>

                    </div>
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->

        </div>

    </div>
    <!-- End of Page Wrapper -->

    <?php
    include("admin_footer.php");
    ?>
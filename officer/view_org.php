<?php
include("user_header.php");
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
    header("Location: user_page.php");
    exit();
}
?>

<style>
    body {
    font-family: Arial, sans-serif;
    font-size: 16px; /* Adjust to your preferred size */
    color: #333333;
}

h3 {
    font-size: 20px;
    color: #0056b3; /* Color that matches the organization's theme */
    margin-bottom: 15px;
}

.card-header h6 {
    font-size: 18px;
    color: #0056b3;
}

.table th {
    background-color: #f2f2f2; /* Light background for table headers */
    color: #333333;
    font-weight: bold;
}

.table td, .table th {
    padding: 10px;
    text-align: left;
}

.tree-layout ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.tree-layout li {
    font-size: 16px;
    margin-bottom: 10px;
}

.card .card-body {
    background-color: #f9f9f9;
}

.card img {
    max-height: 200px;
    object-fit: cover;
}

.btn {
    font-size: 14px;
    padding: 10px 15px;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
}

/* Styling the officer list items */
.tree-layout ul {
    list-style-type: none; /* Remove default list styling */
    padding: 0;
    margin: 0;
}

.tree-layout li {
    margin-bottom: 15px; /* Space between officer cards */
}

/* Style for officer position title */
.tree-layout li strong {
    font-size: 18px;
    color: #0056b3; /* Blue color to emphasize positions */
}

/* Officer card style */
.officer-card {
    background-color: #ffffff; /* White background */
    border: 1px solid #e0e0e0; /* Light border */
    padding: 10px; /* Padding inside the card */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow */
    border-radius: 8px; /* Rounded corners */
    transition: transform 0.2s ease, box-shadow 0.2s ease; /* Smooth animation on hover */
}

/* Hover effect for officer cards */
.officer-card:hover {
    transform: translateY(-5px); /* Slightly raise the card on hover */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); /* Enhance shadow on hover */
}


</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include("user_sidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include("user_topbar.php"); ?>

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
                                        <img src="../admin/uploads/<?php echo $organization['logo']; ?>" class="img-fluid rounded" alt="Organization Photo" style="max-width: 250px;">
                                    </div>
                                <?php else: ?>
                                    <div class="text-center mb-3">
                                        <p>No photo available.</p>
                                    </div>
                                <?php endif; ?>

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
                                <tr>
                                    <th>Submitted Requirements</th>
                                    <td>
                                        <?php if (!empty($organization['requirements'])): ?>
                                            <a href="../admin/uploads/<?php echo $organization['requirements']; ?>" target="_blank">View Requirements</a>
                                        <?php else: ?>
                                            <p>No requirements submitted.</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>

                            <hr>

                            <h3>OFFICERS</h3>

                            <div class="text-center mb-3">
                                <a href="campus_org_reg.php?organization_id=<?php echo $organization['id']; ?>" class="btn mb-3 btn-primary">Add Officer</a>
                            </div>

                            <div class="tree-layout">
                                <?php
                                $positions = [
                                    'President' => [],
                                    'Vice President' => [],
                                    'Secretary' => [],
                                    'Treasurer' => [],
                                    'Others' => []
                                ];

                                // Populate the positions array with the officers
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name = $row["firstname"] . " " . $row["lastname"];
                                    $position = $row['position'];

                                    if (isset($positions[$position])) {
                                        $positions[$position][] = $name;
                                    } else {
                                        $positions['Others'][] = $name;
                                    }
                                }
                                ?>

                                <ul class="list-unstyled">
                                    <li><strong>President</strong>
                                        <ul>
                                            <?php foreach ($positions['President'] as $president): ?>
                                                <li><?php echo $president; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li><strong>Vice President</strong>
                                        <ul>
                                            <?php foreach ($positions['Vice President'] as $vicePresident): ?>
                                                <li><?php echo $vicePresident; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li><strong>Secretary</strong>
                                        <ul>
                                            <?php foreach ($positions['Secretary'] as $secretary): ?>
                                                <li><?php echo $secretary; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li><strong>Treasurer</strong>
                                        <ul>
                                            <?php foreach ($positions['Treasurer'] as $treasurer): ?>
                                                <li><?php echo $treasurer; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                            
                                </ul>
                            </div>

                            <hr>

                            <h3>ACTIVITIES</h3>
                            <?php
                            if (mysqli_num_rows($eventsResult) > 0) {
                                echo "<div class='row'>";
                                while ($event = mysqli_fetch_assoc($eventsResult)) {
                                    echo "<div class='col-md-4 mb-4'>";
                                    echo "<div class='card'>";
                                    echo "<img class='card-img-top' src='../admin/{$event['image_path']}' alt='Event Image'>";
                                    echo "<div class='card-body'>";
                                    echo "<h5 class='card-title'>{$event['title']}</h5>";
                                    echo "<p class='card-text'>{$event['description']}</p>";
                                    echo "<p class='card-text'>{$event['date']}</p>";
                                    echo "<a href='view_photos.php?event_id={$event['id']}' class='btn btn-primary'>View Photos</a>";
                                    echo "<a href='upload_photos.php?event_id={$event['id']}' class='btn btn-success ml-2'>Upload Photos</a>";
                                    echo "<a class='btn btn-secondary mt-2' href='event_gallery_file_manage.php?id={$event['id']}'>File Manager</a>";
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

    <?php include("user_footer.php"); ?>
</body>
</html>

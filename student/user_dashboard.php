<?php
include('user_header.php');
include('../include/connection.php'); // Include database connection

// Fetch the total count of students
$studentsQuery = "SELECT COUNT(*) as total_students FROM students";
$studentsResult = mysqli_query($connection, $studentsQuery);
$studentsCount = mysqli_fetch_assoc($studentsResult)['total_students'];

// Fetch the total count of organizations
$organizationsQuery = "SELECT COUNT(*) as total_organizations FROM organizations";
$organizationsResult = mysqli_query($connection, $organizationsQuery);
$organizationsCount = mysqli_fetch_assoc($organizationsResult)['total_organizations'];

// Fetch the total count of events
$eventsQuery = "SELECT COUNT(*) as total_events FROM event_schedule";
$eventsResult = mysqli_query($connection, $eventsQuery);
$eventsCount = mysqli_fetch_assoc($eventsResult)['total_events'];

// Fetch the total count of officers
$officersQuery = "SELECT COUNT(*) as total_officers FROM officers";
$officersResult = mysqli_query($connection, $officersQuery);
$officersCount = mysqli_fetch_assoc($officersResult)['total_officers'];

?>

<body id="page-top">

    <div id="wrapper">

    <?php
    include('user_sidebar.php');
    ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

            <?php
            include('user_topbar.php');
            ?>

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <div class="row">

                        <!-- Students Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Students</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $studentsCount; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Organizations Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Organizations</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $organizationsCount; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Events Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Events</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $eventsCount; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Officers Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Officers</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $officersCount; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <?php
            include('user_footer.php');
            ?>
        </div>
    </div>
</body>
</html>

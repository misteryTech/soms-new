<?php
include("admin_header.php");
session_start();
include("../include/connection.php");

// Fetch organizer names from the organizations table
$orgSql = "SELECT id, organization_name, advisor_name FROM organizations";
$orgResult = $connection->query($orgSql);

$organizers = [];
if ($orgResult->num_rows > 0) {
    while ($orgRow = $orgResult->fetch_assoc()) {
        $organizers[$orgRow['id']] = $orgRow['organization_name'];
    }
}

$connection->close();
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

                <?php
                if (isset($_SESSION['message'])) {
                    echo "<div class='alert {$_SESSION['message_type']}' role='alert'>{$_SESSION['message']}</div>";
                    unset($_SESSION['message']);
                    unset($_SESSION['message_type']);
                }
                ?>

                <!-- Container for Calendar -->
                <div class="container mt-5">
                    <div id="calendar"></div>
                </div>

                <!-- Modal for Setting Event -->
                <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eventModalLabel">Set Event</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="eventForm" action="process/event_registration_form.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="title">Event Title</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Event Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Event Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="date">Event Date</label>
                                        <input type="text" class="form-control" id="eventDate" name="date" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="organizer">Organizer</label>
                                        <select class="form-control" id="organizer" name="organizer" required>
                                            <option value="" disabled selected>Select organizer</option>
                                            <?php foreach ($organizers as $orgId => $organizerName): ?>
                                                <option value="<?php echo htmlspecialchars($orgId); ?>"><?php echo htmlspecialchars($organizerName); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit Event</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Include FullCalendar and dependencies -->
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales-all.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet" />

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth',
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                            },
                            events: {
                                url: 'process/calendar_events_fetch_data.php',
                                method: 'GET',
                                failure: function() {
                                    alert('There was an error while fetching events!');
                                }
                            },
                            dateClick: function (info) {
                                var selectedDate = info.dateStr;
                                document.getElementById('eventDate').value = selectedDate; // Set the selected date in the modal input
                                $('#eventModal').modal('show'); // Show the modal
                            }
                        });
                        calendar.render();
                    });
                </script>

            </div>

            <?php
            include("admin_footer.php");
            ?>

        </div>

    </div>

    <!-- Include jQuery, Popper, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

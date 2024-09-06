<?php
include("admin_header.php");
session_start();
include("../include/connection.php")
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

                
                <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="event_mngmnt.php" method="POST">
                                    <div class="form-group">
                                        <label for="title">Event Title</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" class="form-control" id="date" name="date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="time">Time</label>
                                        <input type="time" class="form-control" id="time" name="time" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <textarea class="form-control" id="location" name="location" rows="5" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary d-block mx-auto">Add Event</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales-all.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet" />

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth',
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                            },
                            events: [], 
                            dateClick: function(info) {
                                
                                $('#date').val(info.dateStr); 
                                $('#addEventModal').modal('show');
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
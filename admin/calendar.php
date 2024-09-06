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

                <div class="container mt-5">
                    <div id="calendar"></div>
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
                               
                                var selectedDate = info.dateStr;
                                console.log('Clicked date: ' + selectedDate);
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
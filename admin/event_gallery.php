
<style>
    #eventPhotosGallery img {
        height: 150px; /* Fixed height */
        width: auto;
        margin: 5px;
    }
    #eventPhotosGallery {
        overflow-x: auto; /* Enable horizontal scrolling if there are many images */
        max-height: 200px; /* Limit the gallery's height */
        width: 100%; /* Make it responsive */
    }
</style>

<?php
include("admin_header.php");
session_start();
include("../include/connection.php");

$sql = "SELECT e.id, e.title, e.description, e.date, e.image_path, o.organization_name
        FROM event_schedule e
        INNER JOIN organizations o ON e.org_id = o.id";
$result = $connection->query($sql);

$events = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

$connection->close();
?>

<body id="page-top">

    <div id="wrapper">
        <?php include("admin_sidebar.php"); ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php include("admin_topbar.php"); ?>

                <div class="container mt-5">
                    <h2 class="mb-4">Events Gallery</h2>
                    <div class="row">
                        <?php foreach ($events as $event): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="process/<?php echo $event['image_path']; ?>" class="card-img-top" alt="<?php echo $event['title']; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $event['title']; ?></h5>
                                    </div>
                                    <button class="btn btn-success view-btn" data-toggle="modal" data-target="#eventModal"
                                            data-id="<?php echo $event['id']; ?>" data-title="<?php echo $event['title']; ?>"
                                            data-description="<?php echo $event['description']; ?>"
                                            data-date="<?php echo $event['date']; ?>"
                                            data-image="<?php echo $event['image_path']; ?>"
                                            data-organizer="<?php echo $event['organization_name']; ?>">View</button>
                                    <!-- New Upload Button -->
                                    <button class="btn btn-primary upload-btn mt-2" data-toggle="modal" data-target="#uploadModal"
                                            data-id="<?php echo $event['id']; ?>">Upload Photo</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

        <!-- Event Details Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Added modal-lg for large size -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Event Details -->
                <label for="">Event Title:</label>
                <h5 id="eventTitle"></h5>
                <br>
                <label for="">Event Description:</label>
                <p id="eventDescription"></p>
                <br>
                <label for="">Event Date:</label>
                <p id="eventDate"></p>
                <label for="">Organizer:</label>
                <p id="eventOrganizer"></p>

                <!-- Event Photos -->
                <label for="" class="mt-4">Event Photos:</label>
                <div id="eventPhotosGallery" class="d-flex flex-wrap justify-content-start">
                    <!-- Event photos will be appended here by JavaScript -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- Upload Photo Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Event Photos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" action="ajax/upload_event_photos.php" method="POST" enctype="multipart/form-data">
                    <!-- Add hidden input field to hold the event ID -->
                    <input type="hidden" name="event_id" id="uploadEventId">
                    <div class="form-group">
                        <label for="eventPhotos">Choose Photos:</label>
                        <!-- Enable multiple file selection -->
                        <input type="file" name="event_photos[]" id="eventPhotos" class="form-control" multiple required>
                    </div>
                    <button type="submit" class="btn btn-success">Upload</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

            </div>

            <?php include("admin_footer.php"); ?>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const viewButtons = document.querySelectorAll('.view-btn');
    const uploadButtons = document.querySelectorAll('.upload-btn');

    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const eventId = button.getAttribute('data-id');
            const eventTitle = button.getAttribute('data-title');
            const eventDescription = button.getAttribute('data-description');
            const eventDate = button.getAttribute('data-date');
            const eventOrganizer = button.getAttribute('data-organizer');
            const eventImage = button.getAttribute('data-image');

            document.getElementById('eventTitle').textContent = eventTitle;
            document.getElementById('eventDescription').textContent = eventDescription;
            document.getElementById('eventDate').textContent = eventDate;
            document.getElementById('eventOrganizer').textContent = eventOrganizer;

            // Fetch and display all photos for the event
            fetch('ajax/get_event_photos.php?event_id=' + eventId)
                .then(response => response.json())
                .then(data => {
                    const gallery = document.getElementById('eventPhotosGallery');
                    gallery.innerHTML = ''; // Clear the previous content
                    data.photos.forEach(photo => {
                        const img = document.createElement('img');
                        img.src = 'ajax/' + photo.photo_path;
                        img.classList.add('img-thumbnail', 'm-2');
                        img.style.width = '150px';
                        gallery.appendChild(img);
                    });
                });
        });
    });

    // Handle the upload button click
    uploadButtons.forEach(button => {
        button.addEventListener('click', function() {
            const eventId = button.getAttribute('data-id');
            // Set the event ID in the hidden input of the upload form
            document.getElementById('uploadEventId').value = eventId;
        });
    });
});

    </script>
</body>

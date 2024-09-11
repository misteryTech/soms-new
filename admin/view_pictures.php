<?php
include('admin_header.php');
include('../include/connection.php');
session_start();

if (isset($_GET['folder']) && isset($_GET['event_id'])) {
    $folder_name = urldecode($_GET['folder']);
    $event_id = mysqli_real_escape_string($connection, $_GET['event_id']);

    $folder_path = 'uploads/' . $event_id . '/' . $folder_name;

    if (!is_dir($folder_path)) {
        $_SESSION['error'] = "Invalid folder.";
        header('location: event_gallery.php');
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid Request.";
    header('location: event_gallery.php');
    exit();
}

// Fetch all images in the folder
$images = glob($folder_path . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

// Handle image deletion
if (isset($_GET['delete'])) {
    $image_to_delete = urldecode($_GET['delete']);

    if (file_exists($image_to_delete)) {
        unlink($image_to_delete); // Delete the file
        $_SESSION['success'] = "Image deleted successfully.";
        header('location: view_pictures.php?folder=' . urlencode($folder_name) . '&event_id=' . $event_id);
        exit();
    } else {
        $_SESSION['error'] = "Error: Image not found.";
        header('location: view_pictures.php?folder=' . urlencode($folder_name) . '&event_id=' . $event_id);
        exit();
    }
}
?>

<body id="page-top">
    <div id="wrapper">
        <?php include('admin_sidebar.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include('admin_topbar.php'); ?>

                <div class="container-fluid">
                    <h1>Viewing Pictures in Folder: <?php echo htmlspecialchars($folder_name); ?></h1>

                    <div class="card mt-4">
                        <div class="card-body">
                            <?php if (!empty($images)): ?>
                                <div class="row">
                                    <?php foreach ($images as $image): ?>
                                        <div class="col-md-3 mb-4">
                                            <div class="card">
                                                <img src="<?php echo $image; ?>" class="card-img-top img-fluid" alt="Image">
                                                <div class="card-body">
                                                    <a href="<?php echo $image; ?>" target="_blank" class="btn btn-info btn-sm">View Full Size</a>
                                                    <a href="<?php echo $image; ?>" download class="btn btn-primary btn-sm">Download</a>
                                                    <a href="view_pictures.php?folder=<?php echo urlencode($folder_name); ?>&event_id=<?php echo $event_id; ?>&delete=<?php echo urlencode($image); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p>No images found in this folder.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include('admin_footer.php'); ?>
</body>
</html>

<?php
include('admin_header.php');
include('../include/connection.php');
session_start();

if(isset($_GET['id'])){
    $event_id =  mysqli_real_escape_string($connection, $_GET['id']);
} else {
    $_SESSION['error'] = "Invalid Request.";
    header('location: event_gallery.php');
    exit();
}

// Handle folder creation
if (isset($_POST['create_folder'])) {
    $folder_name = mysqli_real_escape_string($connection, $_POST['folder_name']);
    $path = 'uploads/' . $event_id . '/' . $folder_name;

    if (!file_exists($path)) {
        mkdir($path, 0777, true);
        $query = "INSERT INTO event_folders (event_id, folder_name, created_at) VALUES ('$event_id', '$folder_name', NOW())";
        if(mysqli_query($connection, $query)) {
            $message = "Folder '$folder_name' created successfully!";
        } else {
            $message = "Database error: " . mysqli_error($connection);
        }
    } else {
        $message = "Folder '$folder_name' already exists!";
    }
}

// Handle photo upload
if (isset($_POST['upload_photo'])) {
    $target_folder = mysqli_real_escape_string($connection, $_POST['target_folder']);
    $target_dir = 'uploads/' . $event_id . '/' . $target_folder . '/';

    foreach($_FILES['photos']['name'] as $key => $file_name) {
        $target_file = $target_dir . basename($file_name);
        $file_tmp = $_FILES['photos']['tmp_name'][$key];

        if(move_uploaded_file($file_tmp, $target_file)) {
            $query = "INSERT INTO event_photos (event_id, folder_name, photo_name, uploaded_at) VALUES ('$event_id', '$target_folder', '$file_name', NOW())";
            if(mysqli_query($connection, $query)) {
                $message = "Photo '$file_name' uploaded successfully!";
            } else {
                $message = "Database error: " . mysqli_error($connection);
            }
        } else {
            $message = "Error uploading photo '$file_name'.";
        }
    }
}

// Handle folder rename
if (isset($_POST['rename_folder'])) {
    $old_folder = mysqli_real_escape_string($connection, $_POST['old_folder']);
    $new_folder = mysqli_real_escape_string($connection, $_POST['new_folder']);
    $old_path = 'uploads/' . $event_id . '/' . $old_folder;
    $new_path = 'uploads/' . $event_id . '/' . $new_folder;

    if (file_exists($old_path) && !file_exists($new_path)) {
        rename($old_path, $new_path);
        $query = "UPDATE event_folders SET folder_name='$new_folder' WHERE event_id='$event_id' AND folder_name='$old_folder'";
        if (mysqli_query($connection, $query)) {
            $message = "Folder renamed successfully!";
        } else {
            $message = "Database error: " . mysqli_error($connection);
        }
    } else {
        $message = "Folder rename failed!";
    }
}

// Handle folder deletion
if (isset($_POST['delete_folder'])) {
    $folder_to_delete = mysqli_real_escape_string($connection, $_POST['folder_to_delete']);
    $folder_path = 'uploads/' . $event_id . '/' . $folder_to_delete;

    function delete_folder($folder_path) {
        foreach(glob($folder_path . '/*') as $file) {
            if(is_dir($file)) {
                delete_folder($file);
            } else {
                unlink($file);
            }
        }
        rmdir($folder_path);
    }

    delete_folder($folder_path);
    $query = "DELETE FROM event_folders WHERE event_id='$event_id' AND folder_name='$folder_to_delete'";
    if (mysqli_query($connection, $query)) {
        $message = "Folder '$folder_to_delete' deleted successfully!";
    } else {
        $message = "Database error: " . mysqli_error($connection);
    }
}

// Fetch all folders for this event
$directory = 'uploads/' . $event_id;
$folders = array_filter(glob($directory . '/*'), 'is_dir');
?>

<body id="page-top">
    <div id="wrapper">
        <?php include('admin_sidebar.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include('admin_topbar.php'); ?>

                <div class="container-fluid">
                    <h1>Event ID: <?php echo $event_id; ?></h1>

                    <!-- Folder creation form -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4>Create a New Folder</h4>
                            <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="folder_name">Folder Name:</label>
                                    <input type="text" name="folder_name" class="form-control" required>
                                </div>
                                <button type="submit" name="create_folder" class="btn btn-primary">Create Folder</button>
                            </form>
                        </div>
                    </div>

                    <!-- Display the list of folders with options to upload photos, rename, view, or delete folders -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4>Manage Folders</h4>
                            <ul class="list-group">
                                <?php if (!empty($folders)): ?>
                                    <?php foreach ($folders as $folder): ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong><?php echo basename($folder); ?></strong>

                                            <div class="ml-auto">
                                                <!-- View Pictures -->
                                                <a href="view_pictures.php?folder=<?php echo urlencode(basename($folder)); ?>&event_id=<?php echo $event_id; ?>" class="btn btn-info btn-sm">View Pictures</a>

                                                <!-- Rename Folder -->
                                                <form action="" method="POST" class="d-inline">
                                                    <input type="hidden" name="old_folder" value="<?php echo basename($folder); ?>">
                                                    <input type="text" name="new_folder" placeholder="New Name" required>
                                                    <button type="submit" name="rename_folder" class="btn btn-warning btn-sm">Rename</button>
                                                </form>

                                                <!-- Delete Folder -->
                                                <form action="" method="POST" class="d-inline">
                                                    <input type="hidden" name="folder_to_delete" value="<?php echo basename($folder); ?>">
                                                    <button type="submit" name="delete_folder" class="btn btn-danger btn-sm">Delete</button>
                                                </form>

                                                <!-- Upload Photos -->
                                                <form action="" method="POST" enctype="multipart/form-data" class="d-inline">
                                                    <input type="hidden" name="target_folder" value="<?php echo basename($folder); ?>">
                                                    <input type="file" name="photos[]" multiple class="form-control-file" required>
                                                    <button type="submit" name="upload_photo" class="btn btn-success btn-sm">Upload Photos</button>
                                                </form>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <li class="list-group-item">No folders found.</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('admin_footer.php'); ?>
</body>

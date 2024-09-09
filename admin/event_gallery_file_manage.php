<?php
include('admin_header.php');

// Handle folder creation
if (isset($_POST['create_folder'])) {
    $folder_name = $_POST['folder_name'];

    // Define the path where you want to create the folder
    $path = 'uploads/' . $folder_name;

    // Check if the folder already exists
    if (!file_exists($path)) {
        mkdir($path, 0777, true); // Create the folder with full permissions
        $message = "Folder '$folder_name' created successfully!";
    } else {
        $message = "Folder '$folder_name' already exists!";
    }
}

// Handle folder renaming
if (isset($_POST['rename_folder'])) {
    $old_folder = $_POST['old_folder'];
    $new_folder_name = $_POST['new_folder_name'];
    $old_path = 'uploads/' . $old_folder;
    $new_path = 'uploads/' . $new_folder_name;

    // Check if the new folder name exists
    if (!file_exists($new_path)) {
        rename($old_path, $new_path);
        $message = "Folder '$old_folder' renamed to '$new_folder_name' successfully!";
    } else {
        $message = "Folder '$new_folder_name' already exists!";
    }
}

// Handle folder deletion
if (isset($_POST['delete_folder'])) {
    $folder_to_delete = $_POST['folder_to_delete'];
    $path_to_delete = 'uploads/' . $folder_to_delete;

    // Check if the folder exists
    if (is_dir($path_to_delete)) {
        rmdir($path_to_delete); // Only works if folder is empty
        $message = "Folder '$folder_to_delete' deleted successfully!";
    } else {
        $message = "Folder '$folder_to_delete' doesn't exist!";
    }
}

// Fetch all created folders
$directory = 'uploads';
$folders = array_filter(glob($directory . '/*'), 'is_dir'); // Only get directories
?>

<body id="page-top">
    <div id="wrapper">
        <?php include('admin_sidebar.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include('admin_topbar.php'); ?>

                <div class="container-fluid">
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

                    <!-- Display the list of created folders with options to rename and delete -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4>Created Folders</h4>
                            <ul class="list-group">
                                <?php if (!empty($folders)): ?>
                                    <?php foreach ($folders as $folder): ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <?php echo basename($folder); ?>

                                            <!-- Form for renaming and deleting folder -->
                                            <div>
                                                <!-- Rename folder form -->
                                                <form action="" method="POST" class="d-inline-block mr-2">
                                                    <input type="hidden" name="old_folder" value="<?php echo basename($folder); ?>">
                                                    <div class="form-group mb-0">
                                                        <input type="text" name="new_folder_name" placeholder="New name" required>
                                                        <button type="submit" name="rename_folder" class="btn btn-warning btn-sm">Rename</button>
                                                    </div>
                                                </form>

                                                <!-- Delete folder form -->
                                                <form action="" method="POST" class="d-inline-block">
                                                    <input type="hidden" name="folder_to_delete" value="<?php echo basename($folder); ?>">
                                                    <button type="submit" name="delete_folder" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this folder?');">Delete</button>
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

<?php
include("admin_header.php");
session_start();
include("../include/connection.php");
?>

<body id="page-top" onload="generatePassword()">

    
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
    <h2>Department Registration Form</h2>

    <?php
   
    if (isset($_SESSION['success'])) {
        echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
        unset($_SESSION['error']); 
    }
    ?>

    <form action="process/dept_reg.php" method="POST">
        <div class="form-group">
            <label for="department_name">Deparment Name</label>
            <input type="text" class="form-control" id="deparment_name" name="department_name" required>
        </div>
      
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
                
            </div>
            


        </div>

        
    </div>
    

    <?php
    include("admin_footer.php");
    ?>
    </div>

<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
    //For Validation
    adminLogin(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <!--Common Site Links-->
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    <!--Admin Panel Starts-->
    <!--Admin Dashboard Header Starts-->
    <?php 
    require('inc/header.php');
    
    $is_shutdown = mysqli_fetch_assoc(mysqli_query($con, "SELECT `shutdown` FROM `settings`"))
    ?>
    <!--Admin Dashboard Header Ends-->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3>DASHBOARD</h3>
                    <?php
                        if($is_shutdown['shutdown']){
                            echo<<<data
                                <h6 class="badge bg-danger py-2 px-3 rounded">Shutdown Mode is Active</h6>
                            data;
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--Admin Panel Ends-->
    <!--Comman Site Scripts-->
    <?php require('inc/scripts.php'); ?>
</body>
</html>
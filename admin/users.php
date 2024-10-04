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
    <title>Admin Panel - Users</title>
    <!--Common Site Links-->
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">
    <!--Admin Dashboard Header Starts-->
    <?php require('inc/header.php'); ?>
    <!--Admin Dashboard Header Ends-->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">USERS</h3>
                <!--Users Section Starts-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <!--Users Table Section Starts-->
                        <div class="text-end mb-4">
                            <!--Button Trigger Modal Starts-->
                            <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Type to Search...">
                            <!--Button Trigger Modal Ends-->
                        </div>
                        <!--Users Table Section Ends-->
                        <div class="table-responsive">
                            <table class="table table-hover border text-center" style="min-width: 1300px;">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone no.</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="users-data">
                                    <!--PHP-->
                                    <!--PHP-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--Users Section Ends-->
            </div>
        </div>
        <!--Comman Site Scripts-->
        <?php require('inc/scripts.php'); ?>
        <!--My Inline Script-->
        <script src="scripts/users.js"></script>
</body>

</html>
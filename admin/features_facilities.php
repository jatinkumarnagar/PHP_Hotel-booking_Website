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
    <title>Admin Panel - Features & Facilities</title>
    <!--Common Site Links-->
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">
    <!--Admin Panel Starts-->
    <!--Admin Dashboard Header Starts-->
    <?php require('inc/header.php'); ?>
    <!--Admin Dashboard Header Ends-->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">FEATURES & FACILITIES</h3>
                <!--User Queries Section Starts-->
                <!--Features Section Starts-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <!--Features Table Section Starts-->
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Features</h5>
                            <!--Button Trigger Modal Starts-->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                            <!--Button Trigger Modal Ends-->
                        </div>
                        <!--Features Table Section Ends-->
                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data">
                                    <!--PHP-->
                                    <!--PHP-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--Features Section Ends-->
                <!--Facilities Section Starts-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <!--Facilities Table Section Starts-->
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Facilities</h5>
                            <!--Button Trigger Modal Starts-->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                            <!--Button Trigger Modal Ends-->
                        </div>
                        <!--Facilities Table Section Ends-->
                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" width="40%">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities-data">
                                    <!--PHP-->
                                    <!--PHP-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--Facilities Section Ends-->
                <!--User Queries Section Ends-->
            </div>
        </div>
        <!--Admin Panel Ends-->
        <!-- Features Modal Starts-->
        <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="feature_s_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Feature</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="feature_name" class="form-control shadow-none" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Features Modal Ends-->
        <!--Facilities Modal Starts-->
        <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="facility_s_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Facility</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="facility_name" class="form-control shadow-none" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Icon</label>
                                <input type="file" name="facility_icon" class="form-control shadow-none" accept=".svg" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Desciption</label>
                                <textarea name="facility_desc" class="form-control shadow-none" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--Facilities Modal Ends-->
        <!--Comman Site Scripts-->
        <?php require('inc/scripts.php'); ?>
        <!--My Script-->
        <script src="scripts/features_facilities.js"></script>
</body>

</html>
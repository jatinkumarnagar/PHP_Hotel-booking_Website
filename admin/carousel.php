<?php
require('inc/essentials.php');
//For Validation
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Carousel</title>
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
                <h3 class="mb-4">CAROUSEL</h3>
                <!--Carousel Team Section Starts-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Images</h5>
                            <!--Button Trigger Modal Starts-->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#carousel-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                            <!--Button Trigger Modal Ends-->
                        </div>
                        <div class="row" id="carousel-data">
                        </div>
                    </div>
                </div>
                <!--Carousel Section Ends-->
                <!-- Carousel Modal Starts-->
                <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="carousel_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Image</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Picture</label>
                                        <input type="file" name="carousel_picture" id="carousel_picture_inp" class="form-control shadow-none" accept=".jpg, .png, .webp, .jpeg" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="carousel_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Carousel Team Modal Ends-->
            </div>
        </div>
        <!--Admin Panel Ends-->
        <!--Comman Site Scripts-->
        <?php require('inc/scripts.php'); ?>
        <!--My Script-->
        <script src="scripts/carousel.js"></script>
</body>

</html>
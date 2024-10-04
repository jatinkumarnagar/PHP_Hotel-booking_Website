<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Site Commom Links-->
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - BOOKING</title>
</head>

<body class="bg-light">
    <!--Header Starts-->
    <?php require('inc/header.php'); ?>
    <!--Header Ends-->
    <!--PHP-->
    <?php

    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        redirect('index.php');
    }

    ?>
    <!--PHP-->
    <!--Profile Starts-->
    <div class="container">
        <div class="row">
            <!--Page Header Starts-->
            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold">BOOKINGS</h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="rooms.php" class="text-secondary text-decoration-none">BOOKING</a>
                </div>
            </div>
            <!--Page Header Ends-->
            <!--Booking Starts-->
            <div class="col-12 mb-5 px-4">
                <div class="bg-white p-3 p-md-4 rounded shdadow-sm  mx-auto text-center">
                    <h1 class="fw-bold fs-1">404</h1>
                    <p>Result not found...</p>
                </div>
            </div>
            <!--Booking Ends-->
        </div>
    </div>
    <!--Profile Ends-->
    <!--Footer Starts-->
    <?php require('inc/footer.php'); ?>
    <!--Footer Ends-->
    <!--My Inline Script Starts-->
    <script>
        let info_form = document.getElementById('info-form');

        info_form.addEventListener('submit', function(e) {
            e.preventDefault();

            let data = new FormData();
            data.append('info_form', '');
            data.append('name', info_form.elements['name'].value);
            data.append('phonenum', info_form.elements['phonenum'].value);
            data.append('dob', info_form.elements['dob'].value);
            data.append('pincode', info_form.elements['pincode'].value);
            data.append('address', info_form.elements['address'].value);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/profile.php", true);

            xhr.onload = function() {
                if (this.responseText == 'phone_already') {
                    alert('error', "Phone number is already registered!");
                } else if (this.responseText == 0) {
                    alert('error', "No Changes Made!");
                } else {
                    alert('success', "Changes Saved!");
                }
            }

            xhr.send(data);
        });

        let profile_form = document.getElementById('profile-form');

        profile_form.addEventListener('submit', function(e) {
            e.preventDefault();

            let data = new FormData();
            data.append('profile_form', '');
            data.append('profile', profile_form.elements['profile'].files[0]);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/profile.php", true);

            xhr.onload = function() {
                if (this.responseText == 'inv_img') {
                    alert('error', 'Only JPG, WEBP & PNG images are allowed!');
                } else if (this.responseText == 'upd_failed') {
                    alert('error', 'Image upload failed!');
                } else if (this.responseText == 0) {
                    alert('error', "Updation failed!");
                } else {
                    window.location.href = window.location.pathname;
                }
            }

            xhr.send(data);
        });

        let pass_form = document.getElementById('pass-form');

        pass_form.addEventListener('submit', function(e) {
            e.preventDefault();

            let new_pass = pass_form.elements['new_pass'].value;
            let confirm_pass = pass_form.elements['confirm_pass'].value;

            if (new_pass != confirm_pass) {
                alert('error', 'Password do not match!');
                return false;
            }

            let data = new FormData();
            data.append('pass_form', '');
            data.append('new_pass', new_pass);
            data.append('confirm_pass', confirm_pass);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/profile.php", true);

            xhr.onload = function() {
                if (this.responseText == 'mismatch') {
                    alert('error', 'Password do not match!');
                } else if (this.responseText == 0) {
                    alert('error', "Updation failed!");
                } else {
                    alert('success','Changes Saved!');
                    pass_form.reset();
                }
            }

            xhr.send(data);
        });
    </script>
    <!--My Inline Script Ends-->
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Site Commom Links-->
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - PROFILE</title>
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

    $u_exist = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1", [$_SESSION['uId']], 's');

    if (mysqli_num_rows($u_exist) == 0) {
        redirect('index.php');
    }

    $u_fetch = mysqli_fetch_assoc($u_exist);

    ?>
    <!--PHP-->
    <!--Profile Starts-->
    <div class="container">
        <div class="row">
            <!--Page Header Starts-->
            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold">PROFILE</h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="rooms.php" class="text-secondary text-decoration-none">PROFILE</a>
                </div>
            </div>
            <!--Page Header Ends-->
            <!--Basic Information Starts-->
            <div class="col-12 mb-5 px-4">
                <div class="bg-white p-3 p-md-4 rounded shdadow-sm">
                    <form id="info-form">
                        <h5 class="mb-3 fw-bold">Basic Information</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" value="<?php echo $u_fetch['name'] ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" value="<?php echo $u_fetch['phonenum'] ?>" name="phonenum" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" value="<?php echo $u_fetch['dob'] ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Pincode</label>
                                <input type="number" name="pincode" value="<?php echo $u_fetch['pincode'] ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-8 mb-4">
                                <label class="form-label">Address</label>
                                <textarea rows="1" name="address" class="form-control shadow-none" required><?php echo $u_fetch['address'] ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn text-white custom-bg shandow-none">Save Changes</button>
                    </form>
                </div>
            </div>
            <!--Basic Information Ends-->
            <!--Profile Image Starts-->
            <div class="col-md-4 mb-5 px-4">
                <div class="bg-white p-3 p-md-4 rounded shdadow-sm">
                    <form id="profile-form">
                        <h5 class="mb-3 fw-bold">Picture</h5>
                        <img src="<?php echo USERS_IMG_PATH . $u_fetch['profile'] ?>" class="rounded-circle img-fluid">
                        <!---->
                        <label class="form-label">New Picture</label>
                        <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class=" mb-4 form-control shadow-none" required>
                        <!---->
                        <button type="submit" class="btn text-white custom-bg shandow-none">Save Changes</button>
                    </form>
                </div>
            </div>
            <!--Profile Image Ends-->
            <!--Password Change Starts-->
            <div class="col-md-8 mb-5 px-4">
                <div class="bg-white p-3 p-md-4 rounded shdadow-sm">
                    <form id="pass-form">
                        <h5 class="mb-3 fw-bold">Change Password</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_pass" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_pass" class="form-control shadow-none" required>
                            </div>
                        </div>
                        <button type="submit" class="btn text-white custom-bg shandow-none">Save Changes</button>
                    </form>
                </div>
            </div>
            <!--Password Change Ends-->
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
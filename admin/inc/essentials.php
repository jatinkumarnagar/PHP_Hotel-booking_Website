<?php

//For Front-end Purpose
define('SITE_URL', 'http://127.0.0.1/hotelProject/');
define('ABOUT_IMG_PATH', SITE_URL . 'images/about/');
define('CAROUSEL_IMG_PATH', SITE_URL . 'images/carousel/');
define('FACILITIES_IMG_PATH', SITE_URL . 'images/facilities/');
define('ROOMS_IMG_PATH', SITE_URL . 'images/rooms/');
define('USERS_IMG_PATH', SITE_URL . 'images/users/');

//For Back-end Purpose 
define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/hotelProject/images/');
define('ABOUT_FOLDER', 'about/');
define('CAROUSEL_FOLDER', 'carousel/');
define('FACILITIES_FOLDER', 'facilities/');
define('ROOMS_FOLDER', 'rooms/');
define('USERS_FOLDER', 'users/');

function adminLogin()
{
    session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        echo "
               <script>
                   window.location.href='index.php';
                </script>
            ";
        exit;
    }
    //session_regenerate_id(true);
}

function redirect($url)
{
    echo "
           <script>
               window.location.href='$url';
            </script>
        ";
    exit;
}

function alert($type, $msg)
{
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
            <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
                <strong class="me-3">$msg</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert;
}

function uploadImage($image, $folder)
{
    $valid_mime = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
    $img_mime = $image['type'];

    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; //Invalid image mime or format
    } else if ($image['size'] / (1024 * 1024) > 2) {
        return 'inv_size'; //Invalid size greater than 2mb
    } else {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";

        $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;
        if (move_uploaded_file($image['tmp_name'], $img_path)) {
            return $rname;
        } else {
            return 'upd_failed';
        }
    }
}

function deleteImage($image, $folder)
{
    if (unlink(UPLOAD_IMAGE_PATH . $folder . $image)) {
        return true;
    } else {
        return false;
    }
}

function uploadSVGImage($image, $folder)
{
    $valid_mime = ['image/svg+xml'];
    $img_mime = $image['type'];

    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; //Invalid image mime or format
    } else if ($image['size'] / (1024 * 1024) > 1) {
        return 'inv_size'; //Invalid size greater than 1mb
    } else {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";

        $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;
        if (move_uploaded_file($image['tmp_name'], $img_path)) {
            return $rname;
        } else {
            return 'upd_failed';
        }
    }
}

function uploadUserImage($image)
{
    $valid_mime = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
    $img_mime = mime_content_type($image['tmp_name']);

    // Check if the actual MIME type of the image is valid
    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; // Invalid image MIME type or format
    } else {
        $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        $rname = 'IMG_' . random_int(11111, 99999) . ".jpeg";

        $img_path = UPLOAD_IMAGE_PATH . USERS_FOLDER . $rname;

        // Initialize the image resource
        $img = false;

        // Create an image resource from the uploaded file based on its actual MIME type
        switch ($img_mime) {
            case 'image/png':
                if (function_exists('imagecreatefrompng')) {
                    $img = imagecreatefrompng($image['tmp_name']);
                } else {
                    error_log('GD library does not support PNG images.');
                    return 'inv_img';
                }
                break;
            case 'image/webp':
                if (function_exists('imagecreatefromwebp')) {
                    $img = imagecreatefromwebp($image['tmp_name']);
                } else {
                    error_log('GD library does not support WebP images.');
                    return 'inv_img';
                }
                break;
            case 'image/jpeg':
            case 'image/jpg':
                if (function_exists('imagecreatefromjpeg')) {
                    $img = imagecreatefromjpeg($image['tmp_name']);
                } else {
                    error_log('GD library does not support JPEG images.');
                    return 'inv_img';
                }
                break;
            default:
                error_log('Unsupported image MIME type: ' . $img_mime);
                return 'inv_img'; // Invalid image MIME type
        }

        // If the image resource was created successfully, save it as a JPEG
        if ($img && imagejpeg($img, $img_path, 75)) {
            imagedestroy($img); // Free up memory
            return $rname;
        } else {
            if ($img) {
                imagedestroy($img); // Free up memory if image resource was created
            }
            error_log('Failed to save the image as JPEG.');
            return 'upd_failed'; // Image upload failed
        }
    }
}




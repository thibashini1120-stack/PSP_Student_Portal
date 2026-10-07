<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Student.php';


// ========================================
// SESSION PROTECTION
// ========================================

if (!isset($_SESSION['user_id'])) {

    header(
        "Location: /PSP_Student_Portal/controllers/AuthController.php?action=login"
    );

    exit;
}


$studentModel = new Student($conn);

$action = $_GET['action'] ?? 'profile';


// ========================================
// VIEW PROFILE
// ========================================

if ($action === 'profile') {

    // Get student ID ONLY from active session

    $studentId = $_SESSION['student_id'];

    $student = $studentModel->getStudentById($studentId);

    if (!$student) {

        die("Student profile not found.");

    }

    require_once __DIR__ . '/../views/profile/profile.php';

}


// ========================================
// UPLOAD PROFILE PICTURE
// ========================================

elseif ($action === 'upload') {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

        header(
            "Location: /PSP_Student_Portal/controllers/ProfileController.php"
        );

        exit;
    }


    // Get student ID from active session

    $studentId = $_SESSION['student_id'];


    // Check file exists

    if (
        !isset($_FILES['profile_picture']) ||
        $_FILES['profile_picture']['error'] !== UPLOAD_ERR_OK
    ) {

        $_SESSION['upload_error'] =
            "Please select a valid image file.";

        header(
            "Location: /PSP_Student_Portal/controllers/ProfileController.php"
        );

        exit;
    }


    $file = $_FILES['profile_picture'];


    // ========================================
    // MAXIMUM FILE SIZE: 2MB
    // ========================================

    $maxSize = 2 * 1024 * 1024;

    if ($file['size'] > $maxSize) {

        $_SESSION['upload_error'] =
            "File size must not exceed 2MB.";

        header(
            "Location: /PSP_Student_Portal/controllers/ProfileController.php"
        );

        exit;
    }


    // ========================================
    // ALLOWED EXTENSIONS
    // ========================================

    $allowedExtensions = [
        'jpg',
        'jpeg',
        'png'
    ];


    $extension = strtolower(
        pathinfo(
            $file['name'],
            PATHINFO_EXTENSION
        )
    );


    if (!in_array($extension, $allowedExtensions, true)) {

        $_SESSION['upload_error'] =
            "Only JPG, JPEG and PNG files are allowed.";

        header(
            "Location: /PSP_Student_Portal/controllers/ProfileController.php"
        );

        exit;
    }


    // ========================================
    // MIME TYPE VALIDATION
    // ========================================

    $allowedMimeTypes = [
        'image/jpeg',
        'image/png'
    ];


    $finfo = new finfo(FILEINFO_MIME_TYPE);

    $mimeType = $finfo->file($file['tmp_name']);


    if (!in_array($mimeType, $allowedMimeTypes, true)) {

        $_SESSION['upload_error'] =
            "Invalid image file.";

        header(
            "Location: /PSP_Student_Portal/controllers/ProfileController.php"
        );

        exit;
    }


    // ========================================
    // SECURE UNIQUE FILE NAME
    // ========================================

    $newFileName =
        uniqid('profile_', true)
        . '.'
        . $extension;


    // ========================================
    // UPLOAD DIRECTORY
    // ========================================

    $uploadDirectory =
        __DIR__
        . '/../uploads/profile/';


    // Create folder if it does not exist

    if (!is_dir($uploadDirectory)) {

        mkdir(
            $uploadDirectory,
            0755,
            true
        );
    }


    $destination =
        $uploadDirectory
        . $newFileName;


    // ========================================
    // MOVE UPLOADED FILE
    // ========================================

    if (!move_uploaded_file(
        $file['tmp_name'],
        $destination
    )) {

        $_SESSION['upload_error'] =
            "Failed to upload profile picture.";

        header(
            "Location: /PSP_Student_Portal/controllers/ProfileController.php"
        );

        exit;
    }


    // ========================================
    // UPDATE DATABASE
    // ========================================

    $success =
        $studentModel->updateProfilePicture(
            $studentId,
            $newFileName
        );


    if (!$success) {

        // Delete uploaded file if database update fails

        if (file_exists($destination)) {

            unlink($destination);

        }


        $_SESSION['upload_error'] =
            "Failed to update profile picture.";

        header(
            "Location: /PSP_Student_Portal/controllers/ProfileController.php"
        );

        exit;
    }


    // ========================================
    // SUCCESS
    // ========================================

    $_SESSION['upload_success'] =
        "Profile picture uploaded successfully.";


    header(
        "Location: /PSP_Student_Portal/controllers/ProfileController.php"
    );

    exit;

}


else {

    header(
        "Location: /PSP_Student_Portal/dashboard.php"
    );

    exit;
}

?>
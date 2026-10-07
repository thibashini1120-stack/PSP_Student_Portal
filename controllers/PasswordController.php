<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';


// ========================================
// ACCESS CONTROL
// ========================================

if (!isset($_SESSION['user_id'])) {

    header(
        "Location: /PSP_Student_Portal/controllers/AuthController.php?action=login"
    );

    exit;
}


$userModel = new User($conn);

$action = $_GET['action'] ?? 'change';


// ========================================
// SHOW CHANGE PASSWORD PAGE
// ========================================

if ($action === 'change') {

    require_once __DIR__ . '/../views/profile/change_password.php';

}


// ========================================
// PROCESS PASSWORD UPDATE
// ========================================

elseif ($action === 'update') {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

        header(
            "Location: /PSP_Student_Portal/controllers/PasswordController.php?action=change"
        );

        exit;
    }


    // Get form values

    $oldPassword = $_POST['old_password'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';


    $errors = [];


    // ========================================
    // SERVER-SIDE VALIDATION
    // ========================================

    if ($oldPassword === '') {

        $errors[] = "Old password is required.";

    }


    if ($newPassword === '') {

        $errors[] = "New password is required.";

    }


    if ($confirmPassword === '') {

        $errors[] = "Confirm password is required.";

    }


    if (
        $newPassword !== '' &&
        $confirmPassword !== '' &&
        $newPassword !== $confirmPassword
    ) {

        $errors[] = "New password and confirm password do not match.";

    }


    // ========================================
    // GET CURRENT USER
    // ========================================

    $userId = $_SESSION['user_id'];

    $user = $userModel->getUserById($userId);


    if (!$user) {

        $errors[] = "User account could not be found.";

    }


    // ========================================
    // VERIFY OLD PASSWORD
    // ========================================

    if (
        empty($errors) &&
        !password_verify($oldPassword, $user['password'])
    ) {

        $errors[] = "Old password is incorrect.";

    }


    // ========================================
    // DISPLAY ERRORS
    // ========================================

    if (!empty($errors)) {

        require_once __DIR__ . '/../views/profile/change_password.php';

        exit;
    }


    // ========================================
    // HASH NEW PASSWORD
    // ========================================

    $hashedPassword = password_hash(
        $newPassword,
        PASSWORD_DEFAULT
    );


    // ========================================
    // UPDATE DATABASE
    // ========================================

    $success = $userModel->updatePassword(
        $userId,
        $hashedPassword
    );


    if ($success) {

        $successMessage =
            "Password updated successfully.";

        require_once __DIR__ . '/../views/profile/change_password.php';

        exit;

    } else {

        $errors[] =
            "Failed to update password.";

        require_once __DIR__ . '/../views/profile/change_password.php';

        exit;
    }

}


else {

    header(
        "Location: /PSP_Student_Portal/dashboard.php"
    );

    exit;
}

?>
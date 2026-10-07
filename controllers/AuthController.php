<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

$userModel = new User($conn);

$action = $_GET['action'] ?? 'login';


// ========================================
// SHOW LOGIN PAGE
// ========================================

if ($action === 'login') {

    // If already logged in
    if (isset($_SESSION['user_id'])) {

        header(
            "Location: /PSP_Student_Portal/dashboard.php"
        );

        exit;
    }

    require_once __DIR__ . '/../views/auth/login.php';

}


// ========================================
// PROCESS LOGIN
// ========================================

elseif ($action === 'authenticate') {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

        header(
            "Location: /PSP_Student_Portal/controllers/AuthController.php?action=login"
        );

        exit;
    }


    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';


    $errors = [];


    // Server-side validation

    if ($username === '') {

        $errors[] = "Username is required.";

    }


    if ($password === '') {

        $errors[] = "Password is required.";

    }


    // If validation errors exist

    if (!empty($errors)) {

        require_once __DIR__ . '/../views/auth/login.php';

        exit;
    }


    // Find user

    $user = $userModel->getUserByUsername($username);


    // Check username and password

    if (
        $user &&
        password_verify($password, $user['password'])
    ) {

        // Prevent session fixation
        session_regenerate_id(true);


        // Store logged-in user's information

        $_SESSION['user_id'] = $user['id'];

        $_SESSION['username'] = $user['username'];

        $_SESSION['student_id'] = $user['student_id'];


        // Login successful

        header(
            "Location: /PSP_Student_Portal/dashboard.php"
        );

        exit;

    } else {

        $errors[] = "Invalid username or password.";

        require_once __DIR__ . '/../views/auth/login.php';

        exit;
    }

}


// ========================================
// LOGOUT
// ========================================

elseif ($action === 'logout') {

    $_SESSION = [];

    session_destroy();

    header(
        "Location: /PSP_Student_Portal/controllers/AuthController.php?action=login"
    );

    exit;

}


// ========================================
// UNKNOWN ACTION
// ========================================

else {

    header(
        "Location: /PSP_Student_Portal/controllers/AuthController.php?action=login"
    );

    exit;
}

?>
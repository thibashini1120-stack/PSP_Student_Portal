<?php

session_start();


// ========================================
// SESSION PROTECTION
// ========================================

if (!isset($_SESSION['user_id'])) {

    header(
        "Location: /PSP_Student_Portal/controllers/AuthController.php?action=login"
    );

    exit;
}


$pageTitle =
    "Dashboard - PSP Student Portal";

require_once __DIR__ .
    '/views/layouts/header.php';

?>

<div class="container page-container">


    <div class="mb-4">

        <h1 class="fw-bold">

            Welcome,
            <?= htmlspecialchars(
                $_SESSION['username']
            ) ?>!

        </h1>

        <p class="text-muted">
            Welcome to the PSP Student Portal.
        </p>

    </div>


    <div class="row g-4">


        <!-- PROFILE -->

        <div class="col-md-4">

            <div class="card dashboard-card h-100 shadow-sm border-0">

                <div class="card-body">

                    <h5 class="fw-bold">
                        Student Profile
                    </h5>

                    <p class="text-muted">
                        View your personal student information.
                    </p>

                    <a
                        href="/PSP_Student_Portal/controllers/ProfileController.php"
                        class="btn btn-primary"
                    >
                        View Profile
                    </a>

                </div>

            </div>

        </div>


        <!-- STUDENT MANAGEMENT -->

        <div class="col-md-4">

            <div class="card dashboard-card h-100 shadow-sm border-0">

                <div class="card-body">

                    <h5 class="fw-bold">
                        Student Management
                    </h5>

                    <p class="text-muted">
                        View and manage student records.
                    </p>

                    <a
                        href="/PSP_Student_Portal/controllers/StudentController.php?action=index"
                        class="btn btn-primary"
                    >
                        Manage Students
                    </a>

                </div>

            </div>

        </div>


        <!-- PASSWORD -->

        <div class="col-md-4">

            <div class="card dashboard-card h-100 shadow-sm border-0">

                <div class="card-body">

                    <h5 class="fw-bold">
                        Account Security
                    </h5>

                    <p class="text-muted">
                        Change your account password.
                    </p>

                    <a
                        href="/PSP_Student_Portal/controllers/PasswordController.php?action=change"
                        class="btn btn-primary"
                    >
                        Change Password
                    </a>

                </div>

            </div>

        </div>


    </div>


</div>


<?php

require_once __DIR__ .
    '/views/layouts/footer.php';

?>
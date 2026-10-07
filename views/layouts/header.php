<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = $pageTitle ?? 'PSP Student Portal';

$currentPage = basename($_SERVER['PHP_SELF']);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($pageTitle) ?>
    </title>


    <!-- Google Font -->

<link rel="preconnect" href="https://fonts.googleapis.com">

<link
    rel="preconnect"
    href="https://fonts.gstatic.com"
    crossorigin
>

<link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    <!-- Custom CSS -->

    <link
        rel="stylesheet"
        href="/PSP_Student_Portal/public/css/style.css"
    >

</head>


<body>


<!-- ========================================
     NAVBAR
======================================== -->

<nav class="main-navbar">

    <div class="navbar-container">


        <!-- BRAND -->

        <a
            href="/PSP_Student_Portal/dashboard.php"
            class="brand"
        >

            <div class="brand-icon">

                <i class="bi bi-mortarboard-fill"></i>

            </div>

            <div class="brand-text">

                <span class="brand-title">
                    PSP
                </span>

                <span class="brand-subtitle">
                    Student Portal
                </span>

            </div>

        </a>


        <?php if (isset($_SESSION['user_id'])): ?>


            <!-- DESKTOP NAVIGATION -->

            <div class="desktop-navigation">


                <a
                    href="/PSP_Student_Portal/dashboard.php"
                    class="nav-item-custom <?= $currentPage === 'dashboard.php' ? 'active' : '' ?>"
                >

                    <i class="bi bi-grid-1x2-fill"></i>

                    <span>
                        Dashboard
                    </span>

                </a>


                <a
                    href="/PSP_Student_Portal/controllers/ProfileController.php"
                    class="nav-item-custom <?= strpos($_SERVER['REQUEST_URI'], 'ProfileController') !== false ? 'active' : '' ?>"
                >

                    <i class="bi bi-person-fill"></i>

                    <span>
                        Profile
                    </span>

                </a>


                <a
                    href="/PSP_Student_Portal/controllers/StudentController.php?action=index"
                    class="nav-item-custom <?= strpos($_SERVER['REQUEST_URI'], 'StudentController') !== false ? 'active' : '' ?>"
                >

                    <i class="bi bi-people-fill"></i>

                    <span>
                        Students
                    </span>

                </a>

            </div>


            <!-- USER AREA -->

            <div class="user-area">


                <div class="user-info">

                    <div class="user-avatar">

                        <?= strtoupper(
                            substr(
                                $_SESSION['username'],
                                0,
                                1
                            )
                        ) ?>

                    </div>


                    <div class="user-details">

                        <span class="user-name">

                            <?= htmlspecialchars(
                                $_SESSION['username']
                            ) ?>

                        </span>

                        <span class="user-role">
                            Student
                        </span>

                    </div>

                </div>


                <div class="user-divider"></div>


                <a
                    href="/PSP_Student_Portal/controllers/PasswordController.php?action=change"
                    class="icon-button"
                    title="Account Security"
                >

                    <i class="bi bi-shield-lock-fill"></i>

                </a>


                <a
                    href="/PSP_Student_Portal/controllers/AuthController.php?action=logout"
                    class="logout-button"
                    title="Logout"
                >

                    <i class="bi bi-box-arrow-right"></i>

                </a>

            </div>


            <!-- MOBILE MENU BUTTON -->

            <button
                class="mobile-menu-button"
                id="mobileMenuButton"
                type="button"
            >

                <i class="bi bi-list"></i>

            </button>


        <?php endif; ?>

    </div>


    <!-- MOBILE NAVIGATION -->

    <?php if (isset($_SESSION['user_id'])): ?>

        <div
            class="mobile-navigation"
            id="mobileNavigation"
        >

            <a
                href="/PSP_Student_Portal/dashboard.php"
                class="mobile-nav-item"
            >

                <i class="bi bi-grid-1x2-fill"></i>

                Dashboard

            </a>


            <a
                href="/PSP_Student_Portal/controllers/ProfileController.php"
                class="mobile-nav-item"
            >

                <i class="bi bi-person-fill"></i>

                Profile

            </a>


            <a
                href="/PSP_Student_Portal/controllers/StudentController.php?action=index"
                class="mobile-nav-item"
            >

                <i class="bi bi-people-fill"></i>

                Students

            </a>


            <a
                href="/PSP_Student_Portal/controllers/PasswordController.php?action=change"
                class="mobile-nav-item"
            >

                <i class="bi bi-shield-lock-fill"></i>

                Security

            </a>


            <a
                href="/PSP_Student_Portal/controllers/AuthController.php?action=logout"
                class="mobile-nav-item logout-mobile"
            >

                <i class="bi bi-box-arrow-right"></i>

                Logout

            </a>

        </div>

    <?php endif; ?>


</nav>


<!-- PAGE CONTENT -->

<main class="main-content">
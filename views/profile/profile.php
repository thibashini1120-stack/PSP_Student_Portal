<?php

$pageTitle =
    "My Profile - PSP Student Portal";

require_once __DIR__ .
    '/../layouts/header.php';

?>

<div class="container page-container">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        My Student Profile
                    </h4>

                </div>


                <div class="card-body p-4">


                    <!-- ============================= -->
                    <!-- SUCCESS MESSAGE -->
                    <!-- ============================= -->

                    <?php if (!empty($_SESSION['upload_success'])): ?>

                        <div class="alert alert-success">
                            <?= htmlspecialchars(
                                $_SESSION['upload_success']
                            ) ?>
                        </div>

                        <?php
                        unset($_SESSION['upload_success']);
                        ?>

                    <?php endif; ?>


                    <!-- ============================= -->
                    <!-- ERROR MESSAGE -->
                    <!-- ============================= -->

                    <?php if (!empty($_SESSION['upload_error'])): ?>

                        <div class="alert alert-danger">
                            <?= htmlspecialchars(
                                $_SESSION['upload_error']
                            ) ?>
                        </div>

                        <?php
                        unset($_SESSION['upload_error']);
                        ?>

                    <?php endif; ?>


                    <!-- ============================= -->
                    <!-- PROFILE PICTURE -->
                    <!-- ============================= -->

                    <div class="text-center mb-4">

                        <?php if (
                            !empty($student['profile_picture'])
                        ): ?>

                            <img
                                src="/PSP_Student_Portal/uploads/profile/<?= htmlspecialchars(
                                    $student['profile_picture']
                                ) ?>"
                                alt="Profile Picture"
                                class="rounded-circle shadow-sm"
                                width="150"
                                height="150"
                                style="object-fit: cover;"
                            >

                        <?php else: ?>

                            <div
                                class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto shadow-sm"
                                style="
                                    width:150px;
                                    height:150px;
                                "
                            >

                                <span
                                    class="text-secondary"
                                    style="font-size:60px;"
                                >
                                    👤
                                </span>

                            </div>

                        <?php endif; ?>

                    </div>


                    <!-- ============================= -->
                    <!-- PROFILE PICTURE UPLOAD -->
                    <!-- ============================= -->

                    <div class="mb-4">

                        <form
                            action="/PSP_Student_Portal/controllers/ProfileController.php?action=upload"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            <label
                                for="profile_picture"
                                class="form-label fw-bold"
                            >
                                Upload Profile Picture
                            </label>


                            <input
                                type="file"
                                name="profile_picture"
                                id="profile_picture"
                                class="form-control"
                                accept=".jpg,.jpeg,.png"
                                required
                            >


                            <div class="form-text">
                                Allowed formats: JPG, JPEG and PNG.
                                Maximum file size: 2MB.
                            </div>


                            <button
                                type="submit"
                                class="btn btn-primary mt-3"
                            >
                                Upload Picture
                            </button>

                        </form>

                    </div>


                    <!-- ============================= -->
                    <!-- STUDENT INFORMATION -->
                    <!-- ============================= -->

                    <div class="mb-4">

                        <div class="profile-label">
                            Name
                        </div>

                        <div class="profile-value">
                            <?= htmlspecialchars(
                                $student['name']
                            ) ?>
                        </div>

                    </div>


                    <div class="mb-4">

                        <div class="profile-label">
                            IC Number
                        </div>

                        <div class="profile-value">
                            <?= htmlspecialchars(
                                $student['ic']
                            ) ?>
                        </div>

                    </div>


                    <div class="mb-4">

                        <div class="profile-label">
                            Program
                        </div>

                        <div class="profile-value">
                            <?= htmlspecialchars(
                                $student['program']
                            ) ?>
                        </div>

                    </div>


                    <div class="mb-4">

                        <div class="profile-label">
                            Marks
                        </div>

                        <div class="profile-value">
                            <?= htmlspecialchars(
                                $student['marks']
                            ) ?>
                        </div>

                    </div>


                    <!-- ============================= -->
                    <!-- ACTION BUTTONS -->
                    <!-- ============================= -->

                    <div class="d-flex gap-2">

                        <a
                            href="/PSP_Student_Portal/dashboard.php"
                            class="btn btn-secondary"
                        >
                            Back to Dashboard
                        </a>


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

</div>


<?php

require_once __DIR__ .
    '/../layouts/footer.php';

?>
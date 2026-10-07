<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    $pageTitle = "Change Password - PSP Student Portal";

    require_once __DIR__ . '/../layouts/header.php';

    ?>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Change Password - PSP Student Portal</title>

</head>


<body>


<!-- =====================================================
     CHANGE PASSWORD PAGE
===================================================== -->

<div class="password-page">


    <div class="password-card">


        <!-- =================================================
             CARD HEADER
        ================================================== -->

        <div class="password-card-header">

            <div class="password-icon">

                <i class="bi bi-shield-lock-fill"></i>

            </div>


            <div>

                <h1>
                    Change Password
                </h1>

                <p>
                    Update your account password securely
                </p>

            </div>

        </div>



        <!-- =================================================
             CARD BODY
        ================================================== -->

        <div class="password-card-body">


            <!-- SUCCESS MESSAGE -->

            <?php if (!empty($successMessage)): ?>

                <div class="password-alert password-alert-success">

                    <i class="bi bi-check-circle-fill"></i>

                    <span>
                        <?= htmlspecialchars($successMessage) ?>
                    </span>

                </div>

            <?php endif; ?>



            <!-- ERROR MESSAGES -->

            <?php if (!empty($errors)): ?>

                <div class="password-alert password-alert-danger">

                    <i class="bi bi-exclamation-circle-fill"></i>

                    <div>

                        <strong>
                            Please check the following:
                        </strong>

                        <ul>

                            <?php foreach ($errors as $error): ?>

                                <li>
                                    <?= htmlspecialchars($error) ?>
                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                </div>

            <?php endif; ?>



            <!-- =================================================
                 PASSWORD FORM
            ================================================== -->

            <form
                action="/PSP_Student_Portal/controllers/PasswordController.php?action=update"
                method="POST"
                id="passwordForm"
            >


                <!-- OLD PASSWORD -->

                <div class="password-form-group">

                    <label
                        for="old_password"
                    >

                        <i class="bi bi-lock"></i>

                        Old Password

                    </label>


                    <div class="password-input-wrapper">

                        <input
                            type="password"
                            id="old_password"
                            name="old_password"
                            class="password-input"
                            placeholder="Enter your current password"
                            autocomplete="current-password"
                            required
                        >


                        <button
                            type="button"
                            class="password-toggle"
                            data-target="old_password"
                            aria-label="Show password"
                        >

                            <i class="bi bi-eye"></i>

                        </button>

                    </div>

                </div>



                <!-- NEW PASSWORD -->

                <div class="password-form-group">

                    <label
                        for="new_password"
                    >

                        <i class="bi bi-key"></i>

                        New Password

                    </label>


                    <div class="password-input-wrapper">

                        <input
                            type="password"
                            id="new_password"
                            name="new_password"
                            class="password-input"
                            placeholder="Enter your new password"
                            autocomplete="new-password"
                            required
                        >


                        <button
                            type="button"
                            class="password-toggle"
                            data-target="new_password"
                            aria-label="Show password"
                        >

                            <i class="bi bi-eye"></i>

                        </button>

                    </div>

                </div>



                <!-- CONFIRM PASSWORD -->

                <div class="password-form-group">

                    <label
                        for="confirm_password"
                    >

                        <i class="bi bi-shield-check"></i>

                        Confirm Password

                    </label>


                    <div class="password-input-wrapper">

                        <input
                            type="password"
                            id="confirm_password"
                            name="confirm_password"
                            class="password-input"
                            placeholder="Confirm your new password"
                            autocomplete="new-password"
                            required
                        >


                        <button
                            type="button"
                            class="password-toggle"
                            data-target="confirm_password"
                            aria-label="Show password"
                        >

                            <i class="bi bi-eye"></i>

                        </button>

                    </div>

                </div>



                <!-- PASSWORD MATCH MESSAGE -->

                <div
                    id="passwordMatchMessage"
                    class="password-match-message"
                ></div>



                <!-- =================================================
                     BUTTONS
                ================================================== -->

                <div class="password-actions">


                    <button
                        type="submit"
                        class="password-update-button"
                    >

                        <i class="bi bi-check-lg"></i>

                        Update Password

                    </button>


                    <a
                        href="/PSP_Student_Portal/dashboard.php"
                        class="password-cancel-button"
                    >

                        <i class="bi bi-x-lg"></i>

                        Cancel

                    </a>


                </div>


            </form>


        </div>


    </div>


</div>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>


/* =========================================================
   PASSWORD FORM VALIDATION
========================================================= */

document
    .getElementById("passwordForm")
    .addEventListener("submit", function(event) {


        const oldPassword =
            document.getElementById("old_password").value.trim();


        const newPassword =
            document.getElementById("new_password").value.trim();


        const confirmPassword =
            document.getElementById("confirm_password").value.trim();



        /* OLD PASSWORD */

        if (oldPassword === "") {

            alert(
                "Please enter your old password."
            );

            event.preventDefault();

            return;

        }



        /* NEW PASSWORD */

        if (newPassword === "") {

            alert(
                "Please enter your new password."
            );

            event.preventDefault();

            return;

        }



        /* CONFIRM PASSWORD */

        if (confirmPassword === "") {

            alert(
                "Please confirm your new password."
            );

            event.preventDefault();

            return;

        }



        /* PASSWORD MATCH */

        if (newPassword !== confirmPassword) {

            alert(
                "New password and confirm password do not match."
            );

            event.preventDefault();

            return;

        }


    });



/* =========================================================
   SHOW / HIDE PASSWORD
========================================================= */

document
    .querySelectorAll(".password-toggle")
    .forEach(function(button) {


        button.addEventListener("click", function() {


            const targetId =
                this.getAttribute("data-target");


            const input =
                document.getElementById(targetId);


            const icon =
                this.querySelector("i");


            if (input.type === "password") {

                input.type = "text";

                icon.classList.remove("bi-eye");

                icon.classList.add("bi-eye-slash");

                this.setAttribute(
                    "aria-label",
                    "Hide password"
                );

            }

            else {

                input.type = "password";

                icon.classList.remove("bi-eye-slash");

                icon.classList.add("bi-eye");

                this.setAttribute(
                    "aria-label",
                    "Show password"
                );

            }


        });


    });



/* =========================================================
   PASSWORD MATCH INDICATOR
========================================================= */

const newPasswordInput =
    document.getElementById("new_password");


const confirmPasswordInput =
    document.getElementById("confirm_password");


const matchMessage =
    document.getElementById("passwordMatchMessage");


function checkPasswordMatch() {


    const newPassword =
        newPasswordInput.value;


    const confirmPassword =
        confirmPasswordInput.value;


    if (confirmPassword === "") {

        matchMessage.textContent = "";

        matchMessage.className =
            "password-match-message";

        return;

    }


    if (newPassword === confirmPassword) {

        matchMessage.innerHTML =
            '<i class="bi bi-check-circle-fill"></i> Passwords match.';

        matchMessage.className =
            "password-match-message match-success";

    }

    else {

        matchMessage.innerHTML =
            '<i class="bi bi-x-circle-fill"></i> Passwords do not match.';

        matchMessage.className =
            "password-match-message match-error";

    }

}


newPasswordInput.addEventListener(
    "input",
    checkPasswordMatch
);


confirmPasswordInput.addEventListener(
    "input",
    checkPasswordMatch
);


</script>



<?php

require_once __DIR__ . '/../layouts/footer.php';

?>


</body>

</html>
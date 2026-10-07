<?php

$pageTitle = "Login - PSP Student Portal";

require_once __DIR__ . '/../layouts/header.php';

?>

<style>

/* =========================================================
   LOGIN PAGE
========================================================= */

.login-page {
    width: 100%;
    min-height: calc(100vh - 70px);

    display: flex;
    justify-content: center;
    align-items: flex-start;

    padding: 75px 20px 80px;

    font-family: 'Plus Jakarta Sans', sans-serif;
}


/* =========================================================
   LOGIN CARD
========================================================= */

.login-card {
    width: 100%;
    max-width: 660px;

    overflow: hidden;

    border: 1px solid rgba(255, 255, 255, 0.95);
    border-radius: 22px;

    background: #ffffff;

    box-shadow:
        0 20px 50px rgba(49, 46, 129, 0.16);
}


/* =========================================================
   LOGIN HEADER
========================================================= */

.login-header {
    padding: 32px 35px 22px;

    text-align: center;
}


.login-icon {
    width: 55px;
    height: 55px;

    margin: 0 auto 16px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 15px;

    color: #ffffff;

    background:
        linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );

    font-size: 22px;

    box-shadow:
        0 10px 25px rgba(79, 70, 229, 0.25);
}


.login-header h1 {
    margin: 0;

    color: #111827;

    font-family:
        'Plus Jakarta Sans',
        sans-serif;

    font-size: 29px;
    font-weight: 800;

    line-height: 1.2;

    letter-spacing: -0.7px;
}


.login-header p {
    margin: 8px 0 0;

    color: #64748b;

    font-size: 14px;
    font-weight: 500;
}


/* =========================================================
   LOGIN BODY
========================================================= */

.login-body {
    padding: 8px 35px 35px;
}


/* =========================================================
   ERROR
========================================================= */

.login-alert {
    display: flex;
    align-items: flex-start;

    gap: 10px;

    margin-bottom: 22px;
    padding: 13px 15px;

    border-radius: 10px;

    color: #991b1b;
    background: #fef2f2;

    font-size: 13px;
}


/* =========================================================
   FORM GROUP
========================================================= */

.login-form-group {
    margin-bottom: 22px;
}


.login-form-group label {
    display: flex;
    align-items: center;

    gap: 7px;

    margin-bottom: 8px;

    color: #172033;

    font-size: 14px;
    font-weight: 700;
}


.login-form-group label i {
    color: #4f46e5;
}


/* =========================================================
   INPUT
========================================================= */

.login-input-wrapper {
    position: relative;
    width: 100%;
}


.login-input {
    width: 100%;
    height: 51px;

    padding: 0 15px;

    border: 1px solid #dce3ee;
    border-radius: 10px;

    outline: none;

    color: #172033;
    background: #ffffff;

    font-family:
        'Plus Jakarta Sans',
        sans-serif;

    font-size: 14px;
    font-weight: 500;

    transition: 0.2s ease;

    box-sizing: border-box;
}


.login-input::placeholder {
    color: #94a3b8;
}


.login-input:hover {
    border-color: #c7d2fe;
}


.login-input:focus {
    border-color: #4f46e5;

    box-shadow:
        0 0 0 3px rgba(79, 70, 229, 0.10);
}


/* =========================================================
   PASSWORD INPUT
========================================================= */

.login-input[type="password"],
.login-input[type="text"] {
    padding-right: 50px;
}


/* =========================================================
   SHOW PASSWORD
========================================================= */

.login-password-toggle {
    position: absolute;

    top: 50%;
    right: 7px;

    width: 37px;
    height: 37px;

    display: flex;
    align-items: center;
    justify-content: center;

    transform: translateY(-50%);

    border: 0;
    border-radius: 8px;

    color: #64748b;
    background: transparent;

    cursor: pointer;

    font-size: 15px;
}


.login-password-toggle:hover {
    color: #4f46e5;
    background: #eef2ff;
}


/* =========================================================
   LOGIN BUTTON
========================================================= */

.login-button {
    width: 100%;
    height: 50px;

    margin-top: 3px;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 8px;

    border: 0;
    border-radius: 10px;

    color: #ffffff;

    background:
        linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );

    font-family:
        'Plus Jakarta Sans',
        sans-serif;

    font-size: 14px;
    font-weight: 700;

    cursor: pointer;

    box-shadow:
        0 8px 20px rgba(79, 70, 229, 0.22);

    transition: all 0.2s ease;
}


.login-button:hover {
    color: #ffffff;

    transform: translateY(-2px);

    background:
        linear-gradient(
            135deg,
            #4338ca,
            #6d28d9
        );

    box-shadow:
        0 12px 25px rgba(79, 70, 229, 0.30);
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    .login-page {
        padding: 50px 18px 60px;
    }

    .login-header {
        padding: 28px 25px 20px;
    }

    .login-header h1 {
        font-size: 25px;
    }

    .login-body {
        padding: 8px 25px 30px;
    }
}


@media (max-width: 480px) {

    .login-page {
        padding: 35px 15px 50px;
    }

    .login-card {
        border-radius: 18px;
    }

    .login-header {
        padding: 25px 20px 18px;
    }

    .login-header h1 {
        font-size: 22px;
    }

    .login-body {
        padding: 8px 20px 25px;
    }

}

</style>


<!-- =====================================================
     LOGIN PAGE
===================================================== -->

<div class="login-page">

    <div class="login-card">

        <!-- HEADER -->

        <div class="login-header">

            <div class="login-icon">

                <i class="bi bi-mortarboard-fill"></i>

            </div>

            <h1>
                PSP Student Portal
            </h1>

            <p>
                Student Login
            </p>

        </div>


        <!-- BODY -->

        <div class="login-body">


            <?php if (!empty($errors)): ?>

                <div class="login-alert">

                    <i class="bi bi-exclamation-circle-fill"></i>

                    <div>

                        <?php foreach ($errors as $error): ?>

                            <div>
                                <?= htmlspecialchars($error) ?>
                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

            <?php endif; ?>


            <form
                action="/PSP_Student_Portal/controllers/AuthController.php?action=authenticate"
                method="POST"
                id="loginForm"
            >


                <!-- USERNAME -->

                <div class="login-form-group">

                    <label for="username">

                        <i class="bi bi-person"></i>

                        Username

                    </label>


                    <div class="login-input-wrapper">

                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="login-input"
                            value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                            placeholder="Enter your username"
                            autocomplete="username"
                            required
                        >

                    </div>

                </div>


                <!-- PASSWORD -->

                <div class="login-form-group">

                    <label for="password">

                        <i class="bi bi-lock"></i>

                        Password

                    </label>


                    <div class="login-input-wrapper">

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="login-input"
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required
                        >


                        <button
                            type="button"
                            class="login-password-toggle"
                            id="togglePassword"
                            aria-label="Show password"
                        >

                            <i class="bi bi-eye"></i>

                        </button>

                    </div>

                </div>


                <!-- LOGIN -->

                <button
                    type="submit"
                    class="login-button"
                >

                    <i class="bi bi-box-arrow-in-right"></i>

                    Login

                </button>


            </form>

        </div>

    </div>

</div>


<script>

const togglePassword =
    document.getElementById("togglePassword");

const password =
    document.getElementById("password");


togglePassword.addEventListener("click", function () {

    if (password.type === "password") {

        password.type = "text";

        this.querySelector("i")
            .classList
            .remove("bi-eye");

        this.querySelector("i")
            .classList
            .add("bi-eye-slash");

    } else {

        password.type = "password";

        this.querySelector("i")
            .classList
            .remove("bi-eye-slash");

        this.querySelector("i")
            .classList
            .add("bi-eye");

    }

});

</script>


<?php

require_once __DIR__ . '/../layouts/footer.php';

?>
/* =========================================================
   PSP STUDENT PORTAL
   MAIN JAVASCRIPT
========================================================= */


/* =========================================================
   MOBILE NAVIGATION
========================================================= */

const mobileMenuButton =
    document.getElementById(
        "mobileMenuButton"
    );

const mobileNavigation =
    document.getElementById(
        "mobileNavigation"
    );


if (
    mobileMenuButton &&
    mobileNavigation
) {

    mobileMenuButton.addEventListener(
        "click",
        function () {

            const isOpen =
                mobileNavigation.style.display === "block";


            if (isOpen) {

                mobileNavigation.style.display =
                    "none";

                mobileMenuButton.innerHTML =
                    '<i class="bi bi-list"></i>';

            }
            else {

                mobileNavigation.style.display =
                    "block";

                mobileMenuButton.innerHTML =
                    '<i class="bi bi-x-lg"></i>';

            }

        }
    );

}


/* =========================================================
   DELETE CONFIRMATION
========================================================= */

function confirmDelete() {

    return confirm(
        "Are you sure you want to delete this student?"
    );

}


/* =========================================================
   LOGIN VALIDATION
========================================================= */

const loginForm =
    document.getElementById(
        "loginForm"
    );


if (loginForm) {

    loginForm.addEventListener(
        "submit",
        function (event) {

            const username =
                document
                    .getElementById("username")
                    .value
                    .trim();

            const password =
                document
                    .getElementById("password")
                    .value;


            if (username === "") {

                alert(
                    "Please enter your username."
                );

                event.preventDefault();

                return;

            }


            if (password === "") {

                alert(
                    "Please enter your password."
                );

                event.preventDefault();

                return;

            }

        }
    );

}


/* =========================================================
   STUDENT CREATE VALIDATION
========================================================= */

const studentForm =
    document.getElementById(
        "studentForm"
    );


if (studentForm) {

    studentForm.addEventListener(
        "submit",
        function (event) {

            const name =
                document
                    .getElementById("name")
                    .value
                    .trim();

            const ic =
                document
                    .getElementById("ic")
                    .value
                    .trim();

            const program =
                document
                    .getElementById("program")
                    .value
                    .trim();

            const marks =
                document
                    .getElementById("marks")
                    .value;


            if (name === "") {

                alert(
                    "Please enter the student name."
                );

                event.preventDefault();

                return;

            }


            if (ic === "") {

                alert(
                    "Please enter the IC number."
                );

                event.preventDefault();

                return;

            }


            if (program === "") {

                alert(
                    "Please enter the program."
                );

                event.preventDefault();

                return;

            }


            if (
                marks === "" ||
                Number(marks) < 0 ||
                Number(marks) > 100
            ) {

                alert(
                    "Marks must be between 0 and 100."
                );

                event.preventDefault();

                return;

            }

        }
    );

}


/* =========================================================
   STUDENT EDIT VALIDATION
========================================================= */

const editStudentForm =
    document.getElementById(
        "editStudentForm"
    );


if (editStudentForm) {

    editStudentForm.addEventListener(
        "submit",
        function (event) {

            const name =
                document
                    .getElementById("name")
                    .value
                    .trim();

            const ic =
                document
                    .getElementById("ic")
                    .value
                    .trim();

            const program =
                document
                    .getElementById("program")
                    .value
                    .trim();

            const marks =
                document
                    .getElementById("marks")
                    .value;


            if (name === "") {

                alert(
                    "Please enter the student name."
                );

                event.preventDefault();

                return;

            }


            if (ic === "") {

                alert(
                    "Please enter the IC number."
                );

                event.preventDefault();

                return;

            }


            if (program === "") {

                alert(
                    "Please enter the program."
                );

                event.preventDefault();

                return;

            }


            if (
                marks === "" ||
                Number(marks) < 0 ||
                Number(marks) > 100
            ) {

                alert(
                    "Marks must be between 0 and 100."
                );

                event.preventDefault();

                return;

            }

        }
    );

}


/* =========================================================
   PASSWORD VALIDATION
========================================================= */

const passwordForm =
    document.getElementById(
        "passwordForm"
    );


if (passwordForm) {

    passwordForm.addEventListener(
        "submit",
        function (event) {

            const oldPassword =
                document
                    .getElementById(
                        "old_password"
                    )
                    .value;

            const newPassword =
                document
                    .getElementById(
                        "new_password"
                    )
                    .value;

            const confirmPassword =
                document
                    .getElementById(
                        "confirm_password"
                    )
                    .value;


            if (oldPassword === "") {

                alert(
                    "Please enter your old password."
                );

                event.preventDefault();

                return;

            }


            if (newPassword === "") {

                alert(
                    "Please enter your new password."
                );

                event.preventDefault();

                return;

            }


            if (confirmPassword === "") {

                alert(
                    "Please confirm your new password."
                );

                event.preventDefault();

                return;

            }


            if (
                newPassword !==
                confirmPassword
            ) {

                alert(
                    "New password and confirm password do not match."
                );

                event.preventDefault();

                return;

            }

        }
    );

}
<?php

session_start();

/*
|--------------------------------------------------------------------------
| Session Protection
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION['user_id'])) {

    header(
        "Location: /PSP_Student_Portal/controllers/AuthController.php?action=login"
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| Required Files
|--------------------------------------------------------------------------
*/

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Student.php';


/*
|--------------------------------------------------------------------------
| Initialize Student Model
|--------------------------------------------------------------------------
*/

$studentModel = new Student($conn);


/*
|--------------------------------------------------------------------------
| Get Requested Action
|--------------------------------------------------------------------------
*/

$action = $_GET['action'] ?? 'index';


/*
|--------------------------------------------------------------------------
| READ - Display All Students
|--------------------------------------------------------------------------
*/

if ($action === 'index') {

    $students = $studentModel->getAllStudents();

    require_once __DIR__ . '/../views/students/index.php';

}


/*
|--------------------------------------------------------------------------
| CREATE - Display Create Form
|--------------------------------------------------------------------------
*/

elseif ($action === 'create') {

    require_once __DIR__ . '/../views/students/create.php';

}


/*
|--------------------------------------------------------------------------
| CREATE - Store New Student
|--------------------------------------------------------------------------
*/

elseif ($action === 'store') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = trim($_POST['name'] ?? '');
        $ic = trim($_POST['ic'] ?? '');
        $program = trim($_POST['program'] ?? '');
        $marks = trim($_POST['marks'] ?? '');

        $errors = [];


        /*
        |--------------------------------------------------------------------------
        | Server-Side Validation
        |--------------------------------------------------------------------------
        */

        if ($name === '') {

            $errors[] = "Name is required.";

        }


        if ($ic === '') {

            $errors[] = "IC is required.";

        }


        if ($program === '') {

            $errors[] = "Program is required.";

        }


        if ($marks === '' || !is_numeric($marks)) {

            $errors[] = "Marks must be a number.";

        }

        elseif ($marks < 0 || $marks > 100) {

            $errors[] = "Marks must be between 0 and 100.";

        }


        /*
        |--------------------------------------------------------------------------
        | Display Errors
        |--------------------------------------------------------------------------
        */

        if (!empty($errors)) {

            require_once __DIR__ . '/../views/students/create.php';

        }


        /*
        |--------------------------------------------------------------------------
        | Insert Student
        |--------------------------------------------------------------------------
        */

        else {

            $success = $studentModel->createStudent(
                $name,
                $ic,
                $program,
                $marks
            );


            if ($success) {

                header(
                    "Location: StudentController.php?action=index"
                );

                exit;

            }

            else {

                $errors[] = "Failed to add student.";

                require_once __DIR__ . '/../views/students/create.php';

            }

        }

    }

}


/*
|--------------------------------------------------------------------------
| UPDATE - Display Edit Form
|--------------------------------------------------------------------------
*/

elseif ($action === 'edit') {

    $id = (int) ($_GET['id'] ?? 0);


    if ($id <= 0) {

        die("Invalid student ID.");

    }


    $student = $studentModel->getStudentById($id);


    if (!$student) {

        die("Student not found.");

    }


    require_once __DIR__ . '/../views/students/edit.php';

}


/*
|--------------------------------------------------------------------------
| UPDATE - Save Student Changes
|--------------------------------------------------------------------------
*/

elseif ($action === 'update') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = (int) ($_POST['id'] ?? 0);

        $name = trim($_POST['name'] ?? '');
        $ic = trim($_POST['ic'] ?? '');
        $program = trim($_POST['program'] ?? '');
        $marks = trim($_POST['marks'] ?? '');

        $errors = [];


        /*
        |--------------------------------------------------------------------------
        | Validate Student ID
        |--------------------------------------------------------------------------
        */

        if ($id <= 0) {

            $errors[] = "Invalid student ID.";

        }


        /*
        |--------------------------------------------------------------------------
        | Server-Side Validation
        |--------------------------------------------------------------------------
        */

        if ($name === '') {

            $errors[] = "Name is required.";

        }


        if ($ic === '') {

            $errors[] = "IC is required.";

        }


        if ($program === '') {

            $errors[] = "Program is required.";

        }


        if ($marks === '' || !is_numeric($marks)) {

            $errors[] = "Marks must be a number.";

        }

        elseif ($marks < 0 || $marks > 100) {

            $errors[] = "Marks must be between 0 and 100.";

        }


        /*
        |--------------------------------------------------------------------------
        | Display Errors
        |--------------------------------------------------------------------------
        */

        if (!empty($errors)) {

            $student = [

                'id' => $id,
                'name' => $name,
                'ic' => $ic,
                'program' => $program,
                'marks' => $marks

            ];


            require_once __DIR__ . '/../views/students/edit.php';

        }


        /*
        |--------------------------------------------------------------------------
        | Update Student
        |--------------------------------------------------------------------------
        */

        else {

            $success = $studentModel->updateStudent(
                $id,
                $name,
                $ic,
                $program,
                $marks
            );


            if ($success) {

                header(
                    "Location: StudentController.php?action=index"
                );

                exit;

            }

            else {

                die("Failed to update student.");

            }

        }

    }

}


/*
|--------------------------------------------------------------------------
| DELETE - Delete Student
|--------------------------------------------------------------------------
*/

elseif ($action === 'delete') {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

        header(
            "Location: /PSP_Student_Portal/controllers/StudentController.php?action=index"
        );

        exit;
    }


    $id = (int) ($_POST['id'] ?? 0);


    if ($id <= 0) {

        die("Invalid student ID.");

    }


    // Check whether the student exists

    $student = $studentModel->getStudentById($id);


    if (!$student) {

        die("Student not found.");

    }


    // Delete student

    $success = $studentModel->deleteStudent($id);


    if (!$success) {

        die("Failed to delete student.");

    }


    // Return to student list

    header(
        "Location: /PSP_Student_Portal/controllers/StudentController.php?action=index"
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| Unknown Action
|--------------------------------------------------------------------------
*/

else {

    header(
        "Location: StudentController.php?action=index"
    );

    exit;

}

?>
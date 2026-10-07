<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    $pageTitle = "Students - PSP Student Portal";

    require_once __DIR__ . '/../layouts/header.php';

    ?>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Student Management</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>


<body>


<!-- =====================================================
     STUDENT MANAGEMENT PAGE
===================================================== -->

<div class="students-page">


    <!-- =================================================
         PAGE HEADER
    ================================================== -->

    <div class="students-page-header">

        <div class="students-page-heading">

            <div class="students-title-row">

                <div class="students-title-icon">

                    <i class="bi bi-people-fill"></i>

                </div>


                <div>

                    <h1 class="students-page-title">
                        Student Management
                    </h1>

                    <p class="students-page-description">
                        Manage and maintain student records
                    </p>

                </div>

            </div>

        </div>


        <!-- ADD STUDENT -->

        <a
            href="/PSP_Student_Portal/controllers/StudentController.php?action=create"
            class="students-add-button"
        >

            <i class="bi bi-plus-lg"></i>

            <span>
                Add Student
            </span>

        </a>

    </div>



    <!-- =================================================
         STUDENT TABLE CARD
    ================================================== -->

    <div class="students-table-card">


        <!-- TABLE CARD HEADER -->

        <div class="students-table-header">

            <div>

                <h2 class="students-table-title">

                    <i class="bi bi-person-lines-fill"></i>

                    Student Records

                </h2>

                <p class="students-table-description">
                    View, edit and manage registered students
                </p>

            </div>


            <!-- RECORD COUNT -->

            <div class="students-record-badge">

                <i class="bi bi-database"></i>

                <span>
                    <?= ($students) ? $students->num_rows : 0 ?>
                    Records
                </span>

            </div>

        </div>



        <!-- =================================================
             TABLE
        ================================================== -->

        <div class="students-table-wrapper">

            <table class="students-table">


                <!-- TABLE HEADER -->

                <thead>

                    <tr>

                        <th class="student-id-column">
                            ID
                        </th>

                        <th>
                            Name
                        </th>

                        <th>
                            IC Number
                        </th>

                        <th>
                            Programme
                        </th>

                        <th class="student-marks-column">
                            Marks
                        </th>

                        <th class="student-action-column">
                            Action
                        </th>

                    </tr>

                </thead>



                <!-- TABLE BODY -->

                <tbody>


                <?php if ($students && $students->num_rows > 0): ?>


                    <?php while ($student = $students->fetch_assoc()): ?>


                        <tr>


                            <!-- ID -->

                            <td>

                                <span class="student-id">

                                    <?= htmlspecialchars($student['id']) ?>

                                </span>

                            </td>



                            <!-- NAME -->

                            <td>

                                <div class="student-name-wrapper">

                                    <div class="student-avatar-small">

                                        <?= strtoupper(
                                            substr(
                                                htmlspecialchars($student['name']),
                                                0,
                                                1
                                            )
                                        ) ?>

                                    </div>


                                    <span class="student-name">

                                        <?= htmlspecialchars($student['name']) ?>

                                    </span>

                                </div>

                            </td>



                            <!-- IC -->

                            <td>

                                <span class="student-ic">

                                    <?= htmlspecialchars($student['ic']) ?>

                                </span>

                            </td>



                            <!-- PROGRAM -->

                            <td>

                                <span class="student-program">

                                    <?= htmlspecialchars($student['program']) ?>

                                </span>

                            </td>



                            <!-- MARKS -->

                            <td>

                                <span class="student-mark">

                                    <?= htmlspecialchars($student['marks']) ?>

                                </span>

                            </td>



                            <!-- ACTION -->

                            <td>

                                <div class="student-actions">


                                    <!-- EDIT -->

                                    <a
                                        href="/PSP_Student_Portal/controllers/StudentController.php?action=edit&id=<?= $student['id'] ?>"
                                        class="student-edit-button"
                                    >

                                        <i class="bi bi-pencil-square"></i>

                                        <span>
                                            Edit
                                        </span>

                                    </a>



                                    <!-- DELETE -->

                                    <form
    action="/PSP_Student_Portal/controllers/StudentController.php?action=delete"
    method="POST"
    style="display: inline;"
    onsubmit="return confirm('Are you sure you want to delete this student?');"
>

    <input
        type="hidden"
        name="id"
        value="<?= htmlspecialchars($student['id']) ?>"
    >

    <button
        type="submit"
        class="btn btn-danger"
    >
        Delete
    </button>

</form>


                                </div>

                            </td>


                        </tr>


                    <?php endwhile; ?>


                <?php else: ?>


                    <!-- EMPTY STATE -->

                    <tr>

                        <td
                            colspan="6"
                            class="student-empty-state"
                        >

                            <div class="student-empty-icon">

                                <i class="bi bi-person-x"></i>

                            </div>

                            <h3>
                                No Student Records
                            </h3>

                            <p>
                                There are currently no students registered in the system.
                            </p>


                            <a
                                href="/PSP_Student_Portal/controllers/StudentController.php?action=create"
                                class="students-empty-button"
                            >

                                <i class="bi bi-plus-lg"></i>

                                Add First Student

                            </a>

                        </td>

                    </tr>


                <?php endif; ?>


                </tbody>


            </table>

        </div>


    </div>



    <!-- =================================================
         INFORMATION SECTION
    ================================================== -->

    <div class="students-info-grid">


        <!-- TOTAL STUDENTS -->

        <div class="students-info-card">

            <div class="students-info-icon blue">

                <i class="bi bi-people-fill"></i>

            </div>

            <div>

                <span class="students-info-label">
                    Total Students
                </span>

                <strong class="students-info-number">

                    <?= ($students) ? $students->num_rows : 0 ?>

                </strong>

            </div>

        </div>



        <!-- DATABASE STATUS -->

        <div class="students-info-card">

            <div class="students-info-icon green">

                <i class="bi bi-database-check"></i>

            </div>

            <div>

                <span class="students-info-label">
                    Database Status
                </span>

                <strong class="students-info-status">
                    Connected
                </strong>

            </div>

        </div>



        <!-- MANAGEMENT -->

        <div class="students-info-card">

            <div class="students-info-icon purple">

                <i class="bi bi-shield-check"></i>

            </div>

            <div>

                <span class="students-info-label">
                    Management
                </span>

                <strong class="students-info-status">
                    Active
                </strong>

            </div>

        </div>


    </div>


</div>



<?php

require_once __DIR__ . '/../layouts/footer.php';

?>


</body>

</html>
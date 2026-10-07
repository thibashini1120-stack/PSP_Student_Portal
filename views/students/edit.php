<?php

$pageTitle =
    "Edit Student - PSP Student Portal";

require_once __DIR__ .
    '/../layouts/header.php';

?>

<div class="container page-container">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card shadow-sm border-0">


                <div class="card-header bg-warning">

                    <h4 class="mb-0">
                        Edit Student
                    </h4>

                </div>


                <div class="card-body">


                    <?php if (!empty($errors)): ?>

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                <?php foreach (
                                    $errors as $error
                                ): ?>

                                    <li>
                                        <?= htmlspecialchars(
                                            $error
                                        ) ?>
                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    <?php endif; ?>


                    <form
                        action="/PSP_Student_Portal/controllers/StudentController.php?action=update"
                        method="POST"
                        id="editStudentForm"
                    >


                        <input
                            type="hidden"
                            name="id"
                            value="<?= htmlspecialchars(
                                $student['id']
                            ) ?>"
                        >


                        <div class="mb-3">

                            <label
                                for="name"
                                class="form-label"
                            >
                                Student Name
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                value="<?= htmlspecialchars(
                                    $student['name']
                                ) ?>"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label
                                for="ic"
                                class="form-label"
                            >
                                IC Number
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="ic"
                                name="ic"
                                value="<?= htmlspecialchars(
                                    $student['ic']
                                ) ?>"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label
                                for="program"
                                class="form-label"
                            >
                                Program
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="program"
                                name="program"
                                value="<?= htmlspecialchars(
                                    $student['program']
                                ) ?>"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label
                                for="marks"
                                class="form-label"
                            >
                                Marks
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                id="marks"
                                name="marks"
                                min="0"
                                max="100"
                                value="<?= htmlspecialchars(
                                    $student['marks']
                                ) ?>"
                                required
                            >

                            <div class="form-text">
                                Marks must be between 0 and 100.
                            </div>

                        </div>


                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-warning"
                            >
                                Update Student
                            </button>


                            <a
                                href="/PSP_Student_Portal/controllers/StudentController.php?action=index"
                                class="btn btn-secondary"
                            >
                                Cancel
                            </a>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<?php

require_once __DIR__ .
    '/../layouts/footer.php';

?>
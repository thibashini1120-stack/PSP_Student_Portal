<?php

require_once __DIR__ . '/../config/database.php';

class Student
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // READ - Get all students
    public function getAllStudents()
    {
        $sql = "SELECT id, name, ic, program, marks FROM students";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result;
    }

    // READ - Get one student by ID
        public function getStudentById($id)
    {
        $sql = "SELECT id, name, ic, program, marks, profile_picture
                FROM students
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    // CREATE - Add new student
    public function createStudent($name, $ic, $program, $marks)
    {
        $sql = "INSERT INTO students (name, ic, program, marks)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $ic, $program, $marks);

        return $stmt->execute();
    }

    // UPDATE - Update student
    public function updateStudent($id, $name, $ic, $program, $marks)
    {
        $sql = "UPDATE students
                SET name = ?, ic = ?, program = ?, marks = ?
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "sssii",
            $name,
            $ic,
            $program,
            $marks,
            $id
        );

        return $stmt->execute();
    }

    // DELETE - Delete student
    public function deleteStudent($id)
    {
        $sql = "DELETE FROM students WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    // UPDATE - Profile Picture
    public function updateProfilePicture($studentId, $filename)
    {
        $sql = "UPDATE students
                SET profile_picture = ?
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "si",
            $filename,
            $studentId
        );

        return $stmt->execute();
    }
}
?>
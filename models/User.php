<?php

require_once __DIR__ . '/../config/database.php';

class User
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Find user by username
    public function getUserByUsername($username)
    {
        $sql = "SELECT id, username, password, student_id
                FROM users
                WHERE username = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    // Find user by ID
    public function getUserById($id)
    {
        $sql = "SELECT id, username, password, student_id
                FROM users
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    // Update password
    public function updatePassword($userId, $hashedPassword)
    {
        $sql = "UPDATE users
                SET password = ?
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "si",
            $hashedPassword,
            $userId
        );

        return $stmt->execute();
    }
}
?>
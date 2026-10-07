<?php

require_once "config/database.php";

$username = "shas";
$password = "123456";
$student_id = 1;

$hashedPassword = password_hash(
    $password,
    PASSWORD_DEFAULT
);

$sql = "INSERT INTO users (username, password, student_id)
        VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssi",
    $username,
    $hashedPassword,
    $student_id
);

if ($stmt->execute()) {

    echo "User created successfully.<br>";
    echo "Username: shas<br>";
    echo "Password: 123456";

} else {

    echo "Error: " . $stmt->error;

}

$stmt->close();
$conn->close();

?>
<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $firstName = $_POST['FirstName'] ?? '';
    $lastName = $_POST['LastName'] ?? '';
    $loginType = $_POST['login_type'] ?? 'google';

    if (!$email) {
        echo "Invalid Google user.";
        exit;
    }

    // Check if user already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 0) {
        // If not, insert user
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, login_type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $loginType);
        $stmt->execute();
    }

    // Set session and respond
    $_SESSION['user'] = $email;
    echo "success";
}
?>

<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $loginType = $_POST['login_type'] ?? 'manual';

    // Resume upload
    $resumePath = null;
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "../uploads/";
        $fileName = basename($_FILES["resume"]["name"]);
        $targetFile = $targetDir . time() . "_" . $fileName;
        if (move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFile)) {
            $resumePath = $targetFile;
        }
    }

    // Check if user already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows > 0) {
        echo "User already exists.";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, resume_path, login_type) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $password, $resumePath, $loginType);

    if ($stmt->execute()) {
        $_SESSION['user'] = $email;

        // ✅ Redirect after successful registration
        header("Location: ../HTML/index.html");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
$_SESSION['user'] = $email;
header("Location: ../HTML/index.html");
exit();
?>

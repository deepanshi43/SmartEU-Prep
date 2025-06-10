<?php
$host = 'localhost';
$db = 'user_auth';
$user = 'root';
$pass = ''; // Default XAMPP password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

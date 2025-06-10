<?php
$servername = "localhost";
$username = "root";
$password = ""; // Default is empty in XAMPP
$database = "quiz_db";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

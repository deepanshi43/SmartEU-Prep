<?php
// Allow access from anywhere (for testing/development)
header("Access-Control-Allow-Origin: *");

// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Default for XAMPP
$dbname = "smarteu_prep";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data safely
$experience = $_POST['experience'] ?? '';
$features = $_POST['features'] ?? [];
$other_feature = trim($_POST['other_feature'] ?? '');
$recommendation = $_POST['recommendation'] ?? '';
$testimonial_checkbox = isset($_POST['testimonial_checkbox']) ? $_POST['testimonial_checkbox'] : '';
$testimonial = trim($_POST['testimonial'] ?? '');

// Combine features into a single string
$features_list = implode(", ", $features);
if (!empty($other_feature)) {
    $features_list .= ", " . $other_feature;
}

// Check if the testimonial checkbox was checked
if ($testimonial_checkbox === 'yes') {
    // Prepare SQL query
    $stmt = $conn->prepare("INSERT INTO testimonials (experience, features, recommendation, testimonial) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $experience, $features_list, $recommendation, $testimonial);

    // Execute and redirect if successful
   if ($stmt->execute()) {
    // Redirect to index.html
    header("Location: http://localhost/ai%20prep/AI-Powered-Interview-Preparation-System/HTML/index.html");
    exit();


    } else {
        echo "Error while submitting feedback: " . $stmt->error;
    }

    $stmt->close();
} else {
    // If checkbox not checked, redirect to homepage or other page
    header("Location: http://localhost/ai%20prep/AI-Powered-Interview-Preparation-System/HTML/index.html");
    exit();
}

$conn->close();
?>

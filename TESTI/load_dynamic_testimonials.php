<?php

echo "<style>
    .testimonial-box {
        background-color: white;
        color: black;
        padding: 20px;
        border-radius: 15px;
        margin: 15px;
        width: 300px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
</style>";
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smarteu_prep";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT experience, testimonial FROM testimonials WHERE testimonial != '' ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<div class='testimonial-box'>";
    echo "<p>" . htmlspecialchars($row['testimonial'], ENT_QUOTES) . "</p>";
    echo "<p>Anonymous User</p>";
    echo "<p>(" . htmlspecialchars($row['experience'], ENT_QUOTES) . ")</p>";
    echo "</div>";
  }
} else {
  echo "<p>No testimonials available yet.</p>";
}
$conn->close();
?>

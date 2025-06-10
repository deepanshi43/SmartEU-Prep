<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "quiz_app"; // your DB name

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$language = isset($_POST['language']) ? $_POST['language'] : '';
$num_questions = isset($_POST['no-of-ques']) ? (int)$_POST['no-of-ques'] : 0;

if (!$language || $num_questions < 1 || $num_questions > 10) {
    die("Invalid input. Please go back and try again.");
}

$stmt = $conn->prepare("SELECT question FROM questions WHERE language = ? LIMIT ?");
$stmt->bind_param("si", $language, $num_questions);
$stmt->execute();
$result = $stmt->get_result();

$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[] = $row['question'];
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Your Quiz Questions</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(158, 209, 248);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .quiz-box {
            margin-top: 60px;
            background: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px 40px;
            border-radius: 12px;
            max-width: 500px;
            width: 70%;
            text-align: left;
            padding-left:30px;
            transition: transform 0.3s ease;
        }
.quiz-box:hover {
    transform: scale(1.05); /* grow 5% bigger on hover */
}
        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: decimal;
            padding-left: 25px;
        }

        li {
            margin: 12px 0;
            line-height: 1.6;
            color: #333;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color:rgb(2, 41, 82);
            font-weight: bold;
            transition: color 0.2s ease;
        }

        a:hover {
            color:rgb(44, 65, 88);
        }
    </style>
</head>
<body>
    <div class="quiz-box">
        <h2>Quiz Questions (<?php echo htmlspecialchars(ucfirst($language)); ?>)</h2>

        <?php if (count($questions) > 0): ?>
            <ul>
                <?php foreach ($questions as $q): ?>
                    <li><?php echo htmlspecialchars($q); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No questions found for the selected language.</p>
        <?php endif; ?>

        <p><a href="javascript:history.back()">← Go Back</a></p>

    </div>
</body>
</html>

<?php
// Database connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "safari";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $user_id = 1; // Assume the user is logged in with ID 1 (replace with actual session logic)
    $jeep_id = $_POST['jeep_id'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (user_id, jeep_id, rating, comments) VALUES ('$user_id', '$jeep_id', '$rating', '$comments')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

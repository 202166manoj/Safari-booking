<?php
// Database connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "safari"; // Your database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the user's booking details (for linking feedback)
$user_id = 1; // Assume the user is logged in with ID 1 (replace with actual session logic)
$sql = "SELECT * FROM bookings WHERE user_id = $user_id";
$bookings = $conn->query($sql);

if ($bookings->num_rows == 0) {
    echo "No bookings found for this user.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            padding: 20px;
        }
        .feedback-container {
            max-width: 500px;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="feedback-container">
        <h2>Submit Feedback</h2>
        <form action="submit_feedback.php" method="POST">
            <label for="jeep">Select Jeep</label>
            <select name="jeep_id" id="jeep" required>
                <option value="" disabled selected>Select your jeep</option>
                <?php
                while ($booking = $bookings->fetch_assoc()) {
                    echo "<option value='{$booking['jeep_id']}'>Jeep ID: {$booking['jeep_id']}</option>";
                }
                ?>
            </select>

            <label for="rating">Rating (1-5)</label>
            <input type="number" name="rating" id="rating" min="1" max="5" required>

            <label for="comments">Comments</label>
            <textarea name="comments" id="comments" rows="5" placeholder="Enter your feedback" required></textarea>

            <input type="submit" value="Submit Feedback">
        </form>
    </div>
</body>
</html>

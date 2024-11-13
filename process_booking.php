<?php
// Database connection settings
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

// Get user inputs
$jeep_id = $_POST['passengers'];
$location_id = $_POST['location'];
$date = $_POST['date'];
$time = $_POST['time'];

// Check if the selected jeep is available on the selected date and time
$sql = "SELECT * FROM bookings WHERE jeep_id = ? AND date = ? AND time = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $jeep_id, $date, $time);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Sorry, the selected jeep is already booked for this date and time. Please choose a different time.";
} else {
    // Store the booking in the database
    $sql = "INSERT INTO bookings (jeep_id, location_id, date, time) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $jeep_id, $location_id, $date, $time);

    if ($stmt->execute()) {
        echo "Your booking has been successfully made!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>

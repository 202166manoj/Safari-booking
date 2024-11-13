<?php
// Database connection settings
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "wild_safari";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['password'];

    // Get the email associated with the token
    $sql = "SELECT email FROM password_resets WHERE token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];

        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Update the password in the users table
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $email);
        if ($stmt->execute()) {
            echo "Your password has been reset successfully!";
            // Optionally delete the reset token from the database
            $sql = "DELETE FROM password_resets WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
        } else {
            echo "Error updating password!";
        }
    } else {
        echo "Invalid or expired reset token!";
    }

    $stmt->close();
    $conn->close();
}
?>

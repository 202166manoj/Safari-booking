<?php
// Database connection settings
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "safari"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate a unique token for password reset
        $token = bin2hex(random_bytes(50));

        // Store the token in the database (you need a table to store password reset tokens)
        $sql = "INSERT INTO password_resets (email, token) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();

        // Send reset password link to the user's email
        $resetLink = "http://localhost/reset_password.php?token=" . $token;
        $subject = "Password Reset Request";
        $message = "Click on the following link to reset your password: " . $resetLink;
        $headers = "From: no-reply@wildsafari.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "A password reset link has been sent to your email.";
        } else {
            echo "Error sending email!";
        }
    } else {
        echo "No account is registered with that email.";
    }

    $stmt->close();
    $conn->close();
}
?>

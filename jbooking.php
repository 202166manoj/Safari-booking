<?php
include('db.php');

if (!isset($_GET['jeep_id'])) {
    die("Jeep ID is not provided.");
}

$jeep_id = $_GET['jeep_id'];
$jeep = null;

try {
    $query = $pdo->prepare("SELECT * FROM jeeps WHERE id = :jeep_id");
    $query->bindParam(':jeep_id', $jeep_id, PDO::PARAM_INT);
    $query->execute();
    $jeep = $query->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

if (!$jeep) {
    die("Jeep not found.");
}

$username = $date = $passengers = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $date = $_POST['date'];
    $passengers = $_POST['passengers'];

    if (empty($username) || empty($date) || empty($passengers)) {
        $error = "All fields are required.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO bookings (jeep_id, username, date, passengers) VALUES (:jeep_id, :username, :date, :passengers)");
            $stmt->bindParam(':jeep_id', $jeep_id);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':passengers', $passengers);
            
            if ($stmt->execute()) {
                echo "<p>Booking successful!</p>";
                header("refresh:3;url=index.php");  // Redirect to homepage after 3 seconds
                exit();
            } else {
                echo "<p>Error: Booking failed. Please try again.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking for Jeep</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            padding: 20px;
        }
        .booking-form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        label, input {
            display: block;
            margin: 10px 0;
            width: 100%;
            padding: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Book Your Jeep</h1>

<div class="booking-form">
    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <h2><?= htmlspecialchars($jeep['name']) ?> - <?= htmlspecialchars($jeep['price']) ?> / day</h2>
    <form action="booking.php?jeep_id=<?= htmlspecialchars($jeep['id']) ?>" method="POST">
        <label for="username">Name:</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>" required>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?= htmlspecialchars($date) ?>" required>

        <label for="passengers">Number of Passengers:</label>
        <input type="number" id="passengers" name="passengers" value="<?= htmlspecialchars($passengers) ?>" required>

        <button type="submit">Submit Booking</button>
    </form>
</div>

</body>
</html>

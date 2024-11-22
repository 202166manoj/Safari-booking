<?php
// Include the database connection
include('db.php');

// Check if location_id is provided
if (!isset($_GET['location_id'])) {
    die("Location ID is not provided.");
}

$location_id = $_GET['location_id'];

try {
    // Query to get jeeps available at the specified location
    $query = $pdo->prepare("SELECT id, name, image, price, capacity, availability_status FROM jeeps WHERE location_id = :location_id AND availability_status = 1");
    $query->bindParam(':location_id', $location_id, PDO::PARAM_INT);
    $query->execute();
    $jeeps = $query->fetchAll(PDO::FETCH_ASSOC);

    if (!$jeeps) {
        echo "<p>No available jeeps found for this location.</p>";
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Jeeps</title>
    <style>
        /* Basic styles for the jeeps page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            padding: 20px;
        }
        .jeep-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .jeep-card {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }
        .jeep-card img {
            width: 200px;
            height: 150px;
            margin-right: 20px;
        }
        .jeep-card h2 {
            margin: 0;
        }
        .jeep-card p {
            margin: 5px 0;
        }
        .details {
            margin-bottom: 20px; /* Add space between the details and the button */
        }
        .select-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .select-button:hover {
            background-color: #45a049;
        }

        /* Footer styles */
        footer {
            background-color: #4CAF50; /* Set the footer background to green */
            color: white;
            text-align: center;
            padding: 20px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Available Jeeps at Selected Location</h1>
<div class="jeep-container">
    <?php if ($jeeps): ?>
        <?php foreach ($jeeps as $jeep): ?>
            <div class="jeep-card">
                <img src="<?= htmlspecialchars($jeep['image']) ?>" alt="Jeep Image">
                <div>
                    <h2><?= htmlspecialchars($jeep['name']) ?></h2>
                    <div class="details">
                        <p><strong>Price:</strong> $<?= htmlspecialchars($jeep['price']) ?></p>
                        <p><strong>Capacity:</strong> <?= htmlspecialchars($jeep['capacity']) ?> passengers</p>
                        <p><strong>Availability:</strong> 
                            <?= $jeep['availability_status'] == 1 ? "Available" : "Not Available" ?>
                        </p>
                    </div>
                    <a href="jbooking.php?jeep_id=<?= htmlspecialchars($jeep['id']) ?>" class="select-button">Book This Jeep</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No available jeeps at this location. Please choose a different location.</p>
    <?php endif; ?>
</div>

<!-- Footer Section -->
<footer>
    <p>&copy; 2024 Safari Booking. All rights reserved.</p>
    <p>Visit our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</p>
</footer>

</body>
</html>

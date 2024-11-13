<?php
// Include database connection file
include('db.php');

// Fetch locations from the database
$stmt = $pdo->prepare("SELECT * FROM locations");
$stmt->execute();
$locations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safari Booking - Locations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #4CAF50;
            padding: 20px;
            text-align: center;
            color: white;
        }
        .location-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        .location {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            width: 30%;
            margin-bottom: 20px;
            text-align: center;
        }
        .location img {
            width: 100%;
            border-radius: 8px;
        }
        .location h3 {
            color: #4CAF50;
            margin: 10px 0;
        }
        .location p {
            font-size: 14px;
            color: #555;
        }
        .location button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .location button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header">
        <h1>Choose Your Safari Location</h1>
        <p>Explore the best safari locations and book your adventure!</p>
    </div>

    <!-- Location Selection Section -->
    <div class="location-container">
        <?php foreach ($locations as $location): ?>
            <div class="location">
                <img src="<?php echo $location['image_url']; ?>" alt="Location Image">
                <h3><?php echo $location['location_name']; ?></h3>
                <p><?php echo $location['description']; ?></p>
                <a href="jeeps.php?location_id=<?php echo $location['id']; ?>"><button>Select Jeep</button></a>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>

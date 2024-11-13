<?php
// Admin can view all bookings here
$sql = "SELECT bookings.*, jeeps.name as jeep_name, locations.name as location_name 
        FROM bookings
        JOIN jeeps ON bookings.jeep_id = jeeps.id
        JOIN locations ON bookings.location_id = locations.id";
$bookings = $conn->query($sql);

while ($booking = $bookings->fetch_assoc()) {
    echo "Jeep: " . $booking['jeep_name'] . " - Location: " . $booking['location_name'] . " - Date: " . $booking['date'] . " - Time: " . $booking['time'] . "<br>";
}
?>

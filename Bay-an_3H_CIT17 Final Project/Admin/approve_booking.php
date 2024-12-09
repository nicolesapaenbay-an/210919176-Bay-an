<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];
    $query = "UPDATE bookings SET status='confirmed' WHERE booking_id=$booking_id";
    if (mysqli_query($conn, $query)) {
        echo "Booking approved!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

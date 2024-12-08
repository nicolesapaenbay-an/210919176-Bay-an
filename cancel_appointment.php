<?php
include 'includes/db.php';

if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    // Update the appointment status to 'canceled'
    $query = "UPDATE appointments SET status = 'canceled' WHERE appointment_id = '$appointment_id'";
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error canceling appointment. Please try again.";
    }
} else {
    echo "Invalid appointment ID.";
}
?>

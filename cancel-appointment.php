<?php
session_start();
include 'includes/database.php';

// Check if appointment_id is provided
if (isset($_GET['appointment_id'])) {
    $appointment_id = $_GET['appointment_id'];

    // Update appointment status to canceled
    $sql = "UPDATE Appointments SET status='canceled' WHERE appointment_id='$appointment_id'";
    $conn->query($sql);

    // Redirect to user dashboard
    header("Location: user-dashboard.php");
    exit;
} else {
    echo "Appointment ID missing.";
    exit;
}
?>
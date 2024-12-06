<?php
session_start();
include 'includes/database.php';

// Check if appointment_id is provided
if (isset($_GET['appointment_id'])) {
    $appointment_id = $_GET['appointment_id'];

    // Fetch appointment details (for display)
    $sql = "SELECT a.*, s.service_name, u.full_name AS therapist_name 
            FROM Appointments a
            JOIN Services s ON a.service_id = s.service_id
            JOIN Users u ON a.therapist_id = u.user_id
            WHERE a.appointment_id='$appointment_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $appointment = $result->fetch_assoc();
    } else {
        echo "Appointment not found.";
        exit;
    }
} else {
    echo "Appointment ID missing.";
    exit;
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Insert new review into the database
    $sql = "INSERT INTO Reviews (appointment_id, user_id, rating, comment) 
            VALUES ('$appointment_id', '$user_id')
            
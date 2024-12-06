<?php
session_start();
include 'includes/database.php';

// Check if appointment_id is provided
if (isset($_GET['appointment_id'])) {
    $appointment_id = $_GET['appointment_id'];

    // Fetch appointment details
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <div class="container">
            <h2>Appointment Confirmed!</h2>

            <p>Thank you for booking your appointment.</p>

            <p>Here are your appointment details:</p>
            <p>Service: <?php echo $appointment['service_name']; ?></p>
            <p>Date: <?php echo $appointment['appointment_date']; ?></p>
            <p>Time: <?php echo $appointment['start_time']; ?> - <?php echo $appointment['end_time']; ?></p>
            <p>Therapist: <?php echo $appointment['therapist_name']; ?></p>

            <p>You will receive a confirmation email shortly.</p>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
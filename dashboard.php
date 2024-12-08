<?php
session_start();
include 'includes/db.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Fetch upcoming appointments
$upcoming_query = "SELECT * FROM appointments 
                    WHERE user_id = '$user_id' AND status = 'upcoming'";
$upcoming_result = mysqli_query($conn, $upcoming_query);

// Fetch past appointments
$past_query = "SELECT * FROM appointments 
               WHERE user_id = '$user_id' AND status = 'completed'";
$past_result = mysqli_query($conn, $past_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - CIT17 Wellness</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section class="dashboard">
        <h2>Welcome, <?php echo $_SESSION['full_name']; ?>!</h2>

        <div class="appointments-section">
            <h3>Upcoming Appointments</h3>
            <div class="appointments-list">
                <?php
                if (mysqli_num_rows($upcoming_result) > 0) {
                    while ($appointment = mysqli_fetch_assoc($upcoming_result)) {
                        echo "<div class='appointment-item'>";
                        echo "<p><strong>Service:</strong> {$appointment['service_name']}</p>";
                        echo "<p><strong>Therapist:</strong> {$appointment['therapist_name']}</p>";
                        echo "<p><strong>Date:</strong> {$appointment['date']}</p>";
                        echo "<p><strong>Time:</strong> {$appointment['time']}</p>";
                        echo "<a href='cancel_appointment.php?id={$appointment['appointment_id']}' class='btn cancel-btn'>Cancel</a>";
                        echo "<a href='reschedule_appointment.php?id={$appointment['appointment_id']}' class='btn reschedule-btn'>Reschedule</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>You have no upcoming appointments.</p>";
                }
                ?>
            </div>
        </div>

        <div class="appointments-section">
            <h3>Past Appointments</h3>
            <div class="appointments-list">
                <?php
                if (mysqli_num_rows($past_result) > 0) {
                    while ($appointment = mysqli_fetch_assoc($past_result)) {
                        echo "<div class='appointment-item'>";
                        echo "<p><strong>Service:</strong> {$appointment['service_name']}</p>";
                        echo "<p><strong>Therapist:</strong> {$appointment['therapist_name']}</p>";
                        echo "<p><strong>Date:</strong> {$appointment['date']}</p>";
                        echo "<p><strong>Time:</strong> {$appointment['time']}</p>";
                        echo "<a href='leave_review.php?id={$appointment['appointment_id']}' class='btn review-btn'>Leave Review</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>You have no past appointments.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>
</html>

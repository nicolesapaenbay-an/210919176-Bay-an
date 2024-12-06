<?php
session_start();
include 'includes/database.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch upcoming appointments
$sql = "SELECT a.*, s.service_name, u.full_name AS therapist_name 
        FROM Appointments a
        JOIN Services s ON a.service_id = s.service_id
        JOIN Users u ON a.therapist_id = u.user_id
        WHERE a.user_id = '$user_id' AND a.status IN ('pending', 'confirmed')
        ORDER BY a.appointment_date ASC, a.start_time ASC";
$upcomingAppointments = $conn->query($sql);

// Fetch past appointments
$sql = "SELECT a.*, s.service_name, u.full_name AS therapist_name 
        FROM Appointments a
        JOIN Services s ON a.service_id = s.service_id
        JOIN Users u ON a.therapist_id = u.user_id
        WHERE a.user_id = '$user_id' AND a.status = 'completed'
        ORDER BY a.appointment_date DESC, a.start_time DESC";
$pastAppointments = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <div class="container">
            <h2>User Dashboard</h2>

            <h3>Upcoming Appointments</h3>
            <?php if ($upcomingAppointments->num_rows > 0) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Service</th>
                            <th>Therapist</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($appointment = $upcomingAppointments->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $appointment['appointment_date']; ?></td>
                                <td><?php echo $appointment['start_time']; ?> - <?php echo $appointment['end_time']; ?></td>
                                <td><?php echo $appointment['service_name']; ?></td>
                                <td><?php echo $appointment['therapist_name']; ?></td>
                                <td><?php echo $appointment['status']; ?></td>
                                <td>
                                    <?php if ($appointment['status'] === 'pending') { ?>
                                        <a href="cancel-appointment.php?appointment_id=<?php echo $appointment['appointment_id']; ?>" class="btn">Cancel</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>You have no upcoming appointments.</p>
            <?php } ?>

            <h3>Past Appointments</h3>
            <?php if ($pastAppointments->num_rows > 0) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Service</th>
                            <th>Therapist</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($appointment = $pastAppointments->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $appointment['appointment_date']; ?></td>
                                <td><?php echo $appointment['start_time']; ?> - <?php echo $appointment['end_time']; ?></td>
                                <td><?php echo $appointment['service_name']; ?></td>
                                <td><?php echo $appointment['therapist_name']; ?></td>
                                <td><?php echo $appointment['status']; ?></td>
                                <td>
                                    <a href="leave-review.php?appointment_id=<?php echo $appointment['appointment_id']; ?>" class="btn">Leave Review</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>You have no past appointments.</p>
            <?php } ?>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
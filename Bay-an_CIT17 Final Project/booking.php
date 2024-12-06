<?php
session_start();
include 'includes/database.php';

// Check if service_id is provided
if (isset($_GET['service_id'])) {
    $service_id = $_GET['service_id'];

    // Fetch service details
    $sql = "SELECT * FROM Services WHERE service_id='$service_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $service = $result->fetch_assoc();
    } else {
        echo "Service not found.";
        exit;
    }
} else {
    echo "Service ID missing.";
    exit;
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $therapist_id = $_POST['therapist_id'];
    $appointment_date = $_POST['appointment_date'];
    $start_time = $_POST['start_time'];

    // Calculate end time
    $end_time = date('H:i', strtotime($start_time) + ($service['duration'] * 60));

    // Insert new appointment into the database
    $sql = "INSERT INTO Appointments (user_id, therapist_id, service_id, appointment_date, start_time, end_time) 
            VALUES ('$user_id', '$therapist_id', '$service_id', '$appointment_date', '$start_time', '$end_time')";

    if ($conn->query($sql) === TRUE) {
        $appointment_id = $conn->insert_id;

        // Redirect to payment page
        header("Location: payment.php?appointment_id=$appointment_id");
        exit;
    } else {
        $error = "Error booking appointment: " . $conn->error;
    }
}

// Fetch therapists for the selected service (assuming therapists can offer multiple services)
$sql = "SELECT * FROM Users WHERE role='therapist'";
$therapists = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <div class="container">
            <h2>Book Appointment for <?php echo $service['service_name']; ?></h2>
            <?php if (isset($error)) { echo '<p class="error">' . $error . '</p>'; } ?>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?service_id=' . $service_id; ?>">
                <div>
                    <label for="therapist_id">Choose Therapist:</label>
                    <select id="therapist_id" name="therapist_id" required>
                        <?php while ($therapist = $therapists->fetch_assoc()) { ?>
                            <option value="<?php echo $therapist['user_id']; ?>"><?php echo $therapist['full_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="appointment_date">Select Date:</label>
                    <input type="text" id="appointment_date" name="appointment_date" required>
                </div>
                <div>
                    <label for="start_time">Select Time:</label>
                    <input type="time" id="start_time" name="start_time" required>
                </div>
                <button type="submit" class="btn">Book Appointment</button>
            </form>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script>
        $(function() {
            $("#appointment_date").datepicker({
                minDate: 0, // Allow booking from today onwards
                dateFormat: 'yy-mm-dd' // Set the date format
            });
        });
    </script>
</body>
</html>
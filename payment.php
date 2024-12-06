<?php
session_start();
include 'includes/database.php';

// Check if appointment_id is provided
if (isset($_GET['appointment_id'])) {
    $appointment_id = $_GET['appointment_id'];

    // Fetch appointment details
    $sql = "SELECT a.*, s.price 
            FROM Appointments a
            JOIN Services s ON a.service_id = s.service_id
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
    $payment_method = $_POST['payment_method'];
    $amount = $appointment['price'];

    // Insert new payment into the database
    $sql = "INSERT INTO Payments (appointment_id, amount, payment_method) 
            VALUES ('$appointment_id', '$amount', '$payment_method')";

    if ($conn->query($sql) === TRUE) {
        $payment_id = $conn->insert_id;

        // Update appointment status to confirmed
        $sql = "UPDATE Appointments SET status='confirmed' WHERE appointment_id='$appointment_id'";
        $conn->query($sql);

        // Redirect to confirmation page
        header("Location: confirmation.php?appointment_id=$appointment_id");
        exit;
    } else {
        $error = "Error processing payment: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <div class="container">
            <h2>Payment</h2>
            <?php if (isset($error)) { echo '<p class="error">' . $error . '</p>'; } ?>

            <p>Appointment Details:</p>
            <p>Service: <?php echo $appointment['service_name']; ?></p>
            <p>Date: <?php echo $appointment['appointment_date']; ?></p>
            <p>Time: <?php echo $appointment['start_time']; ?> - <?php echo $appointment['end_time']; ?></p>
            <p>Price: $<?php echo $appointment['price']; ?></p>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?appointment_id=' . $appointment_id; ?>">
                <div>
                    <label for="payment_method">Payment Method:</label>
                    <select id="payment_method" name="payment_method" required>
                        <option value="cash">Cash</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>
                <button type="submit" class="btn">Pay Now</button>
            </form>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
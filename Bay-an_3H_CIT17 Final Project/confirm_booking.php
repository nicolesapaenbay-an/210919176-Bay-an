<?php
// Include necessary files
include 'includes/db.php';  // Include the database connection

// Get the POST data from the booking form
$service_id = $_POST['service'];  // Service selected by user
$therapist_id = $_POST['therapist'];  // Therapist selected by user
$date = $_POST['date'];  // Date selected by user
$time = $_POST['time'];  // Time selected by user
$payment_method = $_POST['payment_method'];  // Payment method selected by user
$promo_code = $_POST['promo_code'];  // Promo code if provided

// Fetch the service details from the database
$query = "SELECT * FROM services WHERE service_id = '$service_id'";
$result = mysqli_query($conn, $query);
$service = mysqli_fetch_assoc($result);

// Get service details
$service_name = $service['service_name'];
$price = $service['price'];

// Fetch therapist details from the database
$query = "SELECT * FROM therapists WHERE therapist_id = '$therapist_id'";
$result = mysqli_query($conn, $query);
$therapist = mysqli_fetch_assoc($result);

// Get therapist name
$therapist_name = $therapist['therapist_name'];

// Insert booking details into the bookings table
$query = "INSERT INTO bookings (service_id, therapist_id, date, time, payment_method, promo_code, price)
          VALUES ('$service_id', '$therapist_id', '$date', '$time', '$payment_method', '$promo_code', '$price')";
$result = mysqli_query($conn, $query);

// Check if the booking was successful
if ($result) {
    // Send a confirmation email to the user (optional)
    // Code for email could go here

    // Display confirmation message
    echo "
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .confirmation-container {
            text-align: center;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h2 {
            color: #4CAF50;
            font-size: 2em;
            margin-bottom: 20px;
        }
        .confirmation-details p {
            font-size: 1.1em;
            margin: 10px 0;
        }
        .confirmation-details strong {
            font-weight: bold;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>

    <div class='confirmation-container'>
        <h2>Your Appointment has been successfully booked!</h2>
        <div class='confirmation-details'>
            <p><strong>Service:</strong> $service_name</p>
            <p><strong>Therapist:</strong> $therapist_name</p>
            <p><strong>Date:</strong> $date</p>
            <p><strong>Time:</strong> $time</p>
            <p><strong>Price:</strong> $price PHP</p>
            <p><strong>Payment Method:</strong> $payment_method</p>";

    // Optionally display promo code
    if ($promo_code) {
        echo "<p><strong>Promo Code:</strong> $promo_code</p>";
    }

    echo "<p>Thank you for booking with us!</p>
    <a href='index.php' class='btn'>Go to Homepage</a>
    </div>
    </div>
    ";
} else {
    echo "<h2>There was an error with your booking. Please try again.</h2>";
}
?>

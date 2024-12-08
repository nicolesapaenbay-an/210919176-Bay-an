<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment - CIT17 Wellness</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        /* Booking Page Styles */
        .booking-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }
        .booking-form {
            width: 80%;
            max-width: 800px;
            margin: 20px;
        }
        .step {
            margin-bottom: 20px;
        }
        .btn {
            margin-top: 20px;
            display: inline-block;
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
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/db.php'; // Include the database connection ?>

    <section class="booking-container">
        <h1>Book Your Appointment</h1>

        <!-- Booking Form -->
        <form action="confirm_booking.php" method="POST" class="booking-form">
            
            <!-- Step 1: Select Service and Therapist -->
            <div class="step">
                <h2>Step 1: Choose Service and Therapist</h2>
                
                <label for="service">Select Service:</label>
                <select name="service" id="service" required>
                    <?php
                    // Fetch services from the database
                    $query = "SELECT * FROM services";
                    $result = mysqli_query($conn, $query);

                    // Check if services are available
                    if (mysqli_num_rows($result) > 0) {
                        while ($service = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$service['service_id']}' data-price='{$service['price']}'>{$service['service_name']}</option>";
                        }
                    } else {
                        echo "<option>No services available</option>";
                    }
                    ?>
                </select>

                <label for="therapist">Select Therapist:</label>
                <select name="therapist" id="therapist" required>
                    <?php
                    // Fetch therapists from the database
                    $query = "SELECT * FROM therapists";
                    $result = mysqli_query($conn, $query);

                    // Check if therapists are available
                    if (mysqli_num_rows($result) > 0) {
                        while ($therapist = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$therapist['therapist_id']}'>{$therapist['therapist_name']}</option>";
                        }
                    } else {
                        echo "<option>No therapists available</option>";
                    }
                    ?>
                </select>

                <p><strong>Service Summary:</strong> <span id="service-summary">Relaxing Massage</span></p>
                <p><strong>Therapist Summary:</strong> <span id="therapist-summary">Therapist A</span></p>
                <p><strong>Price:</strong> <span id="price-summary">500 PHP</span></p>
            </div>

            <!-- Step 2: Choose Date and Time -->
            <div class="step">
                <h2>Step 2: Choose Date and Time</h2>
                <label for="date">Select Date:</label>
                <input type="date" name="date" id="date" required>

                <label for="time">Select Time:</label>
                <select name="time" id="time" required>
                    <option value="10:00 AM">10:00 AM</option>
                    <option value="12:00 PM">12:00 PM</option>
                    <option value="2:00 PM">2:00 PM</option>
                    <option value="4:00 PM">4:00 PM</option>
                    <option value="6:00 PM">6:00 PM</option>
                </select>
                <p><strong>Date Summary:</strong> <span id="date-summary">10/10/2024</span></p>
                <p><strong>Time Summary:</strong> <span id="time-summary">10:00 AM</span></p>
            </div>

            <!-- Step 3: Confirmation and Payment -->
            <div class="step">
                <h2>Step 3: Confirmation and Payment</h2>
                <p><strong>Service:</strong> <span id="service-confirmation">Relaxing Massage</span></p>
                <p><strong>Therapist:</strong> <span id="therapist-confirmation">Therapist A</span></p>
                <p><strong>Date:</strong> <span id="date-confirmation">10/10/2024</span></p>
                <p><strong>Time:</strong> <span id="time-confirmation">10:00 AM</span></p>
                <p><strong>Price:</strong> <span id="price-confirmation">500 PHP</span></p>

                <label for="payment-method">Select Payment Method:</label>
                <select name="payment_method" id="payment-method" required>
                    <option value="Cash">Cash</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="PayPal">PayPal</option>
                </select>

                <label for="promo-code">Promo Code (optional):</label>
                <input type="text" name="promo_code" id="promo-code" placeholder="Enter promo code">

                <button type="submit" class="btn">Confirm Appointment</button>
            </div>
        </form>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
        // JavaScript to update the summary fields dynamically
        document.getElementById('service').addEventListener('change', function() {
            const service = document.getElementById('service');
            const selectedOption = service.options[service.selectedIndex];
            const price = selectedOption.getAttribute('data-price');

            // Update the summary fields with the selected service
            document.getElementById('service-summary').textContent = selectedOption.text;
            document.getElementById('service-confirmation').textContent = selectedOption.text;

            // Update the price summary with the price from the service
            document.getElementById('price-summary').textContent = price + ' PHP';
            document.getElementById('price-confirmation').textContent = price + ' PHP';
        });

        document.getElementById('therapist').addEventListener('change', function() {
            const therapist = document.getElementById('therapist');
            document.getElementById('therapist-summary').textContent = therapist.options[therapist.selectedIndex].text;
            document.getElementById('therapist-confirmation').textContent = therapist.options[therapist.selectedIndex].text;
        });

        document.getElementById('date').addEventListener('change', function() {
            const date = document.getElementById('date').value;
            document.getElementById('date-summary').textContent = date;
            document.getElementById('date-confirmation').textContent = date;
        });

        document.getElementById('time').addEventListener('change', function() {
            const time = document.getElementById('time').value;
            document.getElementById('time-summary').textContent = time;
            document.getElementById('time-confirmation').textContent = time;
        });
    </script>
</body>
</html>

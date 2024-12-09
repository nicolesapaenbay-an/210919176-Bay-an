<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment - CIT17 Wellness</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
    /* General Page Styles */
    body {
        background-image: url('assets/background.jpg'); /* Replace with your image path */
        background-size: cover; /* Ensure the image covers the entire page */
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Prevent the image from repeating */
        background-attachment: fixed; /* Keep the background fixed during scrolling */
        font-family: 'Arial', sans-serif; /* Use a clean, readable font */
        color: #333; /* Set a dark text color for contrast */
        margin: 0;
        padding: 0;
        line-height: 1.6;
    }

    /* Container Styles */
    .booking-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: rgba(255, 255, 255, 0.95); /* Semi-transparent background */
        padding: 30px;
        margin: 50px auto;
        width: 90%;
        max-width: 1000px;
        border-radius: 15px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Add a subtle shadow */
    }

    h1 {
        font-size: 2.5em;
        color: #4CAF50; /* Match the button color */
        margin-bottom: 20px;
        text-align: center;
    }

    h2 {
        font-size: 1.8em;
        color: #333;
        margin-bottom: 10px;
    }

    label {
        font-size: 1.1em;
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
        color: #555;
    }

    select,
    input[type="date"],
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1em;
        background-color: #f9f9f9;
        transition: border-color 0.3s;
    }

    select:focus,
    input:focus {
        border-color: #4CAF50;
        outline: none;
    }

    /* Form Steps */
    .step {
        margin-bottom: 30px;
        padding: 20px;
        background-color: #f8f8f8;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .step p {
        font-size: 1em;
        margin: 10px 0;
    }

    .btn {
        margin-top: 20px;
        display: inline-block;
        padding: 12px 30px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 50px; /* Make the button rounded */
        font-size: 1.1em;
        transition: background-color 0.3s, transform 0.2s;
        text-align: center;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #45a049;
        transform: scale(1.05); /* Slightly enlarge the button on hover */
    }

    .btn:active {
        transform: scale(1); /* Reset scale on click */
    }

    /* Summary Styles */
    #service-summary,
    #therapist-summary,
    #price-summary,
    #date-summary,
    #time-summary {
        font-weight: bold;
        color: #4CAF50;
    }

    /* Promo Code Input */
    #promo-code {
        width: calc(100% - 20px);
        font-size: 1em;
        margin-top: 10px;
    }

    /* Media Queries for Responsiveness */
    @media (max-width: 768px) {
        h1 {
            font-size: 2em;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1em;
        }

        .booking-container {
            width: 95%;
        }
    }

    @media (max-width: 480px) {
        h1 {
            font-size: 1.8em;
        }

        h2 {
            font-size: 1.5em;
        }

        label {
            font-size: 1em;
        }
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

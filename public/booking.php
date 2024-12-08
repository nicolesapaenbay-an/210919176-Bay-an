<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CIT17 Project - Booking</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

  <section class="booking">
    <h2>Book Your Appointment</h2>
    <form action="includes/process-booking.php" method="POST">
      <div class="booking-step">
        <h3>Step 1: Select Service and Therapist</h3>
        </div>
      <div class="booking-step">
        <h3>Step 2: Choose Date and Time</h3>
        </div>
      <div class="booking-step">
        <h3>Step 3: Confirmation and Payment</h3>
        </div>
      <button type="submit" class="btn">Confirm Appointment</button>
    </form>
  </section>

  <script src="js/script.js"></script>
</body>
</html>
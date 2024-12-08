<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - CIT17 Wellness</title>
    <link rel="stylesheet" href="assets/css/styles.css">
   
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section class="services-list">
        <h2>Available Services</h2>
        <div class="service-list">
        <?php
        include 'includes/db.php';

        $query = "SELECT * FROM services";
        $result = mysqli_query($conn, $query);

        while ($service = mysqli_fetch_assoc($result)) {
            // Get the image path from the database
            $imageSrc = 'assets/' . $service['image']; // Concatenate the image folder path with the filename from the database
            
            echo "<div class='service-item'>";
            echo "<img src='$imageSrc' alt='{$service['service_name']}'>";
            echo "<div class='service-details'>";
            echo "<h3>{$service['service_name']}</h3>";
            echo "<p>{$service['description']}</p>";
            echo "<p><strong>Price:</strong> {$service['price']} PHP</p>";
            echo "<p><strong>Duration:</strong> {$service['duration']} minutes</p>";
            echo "</div>";
            echo "<div class='service-actions'>";
            echo "<a href='booking.php?service_id={$service['service_id']}' class='btn'>Book Now</a>";
            echo "</div>";
            echo "</div>";
        }
        ?>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>
</html>

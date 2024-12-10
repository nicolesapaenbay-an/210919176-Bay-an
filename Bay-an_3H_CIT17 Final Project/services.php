<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - CIT17 Wellness</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Header */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        header a {
            color: #ffcc00;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            margin: 0 10px;
        }

        /* Services Section */
        .services-list {
            padding: 40px 20px;
        }

        h2 {
            text-align: center;
            color: #ffcc00;
            font-size: 36px;
            margin-bottom: 40px;
        }

        .service-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        /* Service Item Styles */
        .service-item {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            transition: transform 0.3s ease;
        }

        .service-item:hover {
            transform: translateY(-5px); /* Subtle hover effect */
        }

        /* For future use when adding images */
        .service-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .service-details {
            padding: 20px;
            text-align: center;
        }

        .service-details h3 {
            font-size: 24px;
            color: #ff9900;
            margin-bottom: 10px;
        }

        .service-details p {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }

        .service-details strong {
            font-weight: bold;
            color: #333;
        }

        /* Action Button */
        .service-actions {
            text-align: center;
            padding: 10px;
            background-color: #f7f7f7;
        }

        .service-actions .btn {
            display: inline-block;
            background-color: #ffcc00;
            color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .service-actions .btn:hover {
            background-color: #ff9900;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .service-list {
                flex-direction: column;
                align-items: center;
            }

            .service-item {
                width: 80%;
                margin: 10px auto;
            }
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section class="services-list">
        <h2>Available Services</h2>
        <div class="service-list">
        <?php
        // Include the database connection
        include 'includes/db.php';

        // Query to fetch services from the database
        $query = "SELECT * FROM services";
        $result = mysqli_query($conn, $query);

        // Check if there are any services in the database
        if (mysqli_num_rows($result) > 0) {
            // Loop through each service and display it
            while ($service = mysqli_fetch_assoc($result)) {
                // Here we're skipping the image for now
                
                echo "<div class='service-item'>";
                // Uncomment below when images are added
                // echo "<img src='assets/images/{$service['image']}' alt='{$service['service_name']}'>";
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
        } else {
            echo "<p>No services available at the moment. Please check back later.</p>";
        }
        ?>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>
</html>

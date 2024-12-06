<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <!-- Hero Section -->
        <section id="hero">
            <div class="container">
                <h1>Welcome to Our Booking System</h1>
                <p>Your wellness journey starts here.</p>
                <a href="services.php" class="btn">View Services</a>
            </div>
        </section>

        <!-- Services Overview -->
        <section id="services">
            <div class="container">
                <h2>Our Services</h2>
                <div class="services-grid">
                    <!-- Services will be loaded here -->
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section id="testimonials">
            <div class="container">
                <h2>What Our Clients Say</h2>
                <div class="testimonial-slider">
                    <!-- Testimonials will be loaded here -->
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section id="cta">
            <div class="container">
                <p>Ready to book your appointment? Get started today!</p>
                <a href="register.php" class="btn">Create Account</a>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>
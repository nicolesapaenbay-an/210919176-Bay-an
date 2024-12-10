<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - CIT17 Final Project</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
    /* Global Background */
    body {
        background-image: url('assets/spaa.gif');
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
        background-attachment: fixed;
        color: #fff;
        font-family: Arial, sans-serif;
    }

    /* Hero Section */
    .hero {
        background-image: url('assets/spa_banner.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        text-align: center;
        color: black;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); /* Add shadow for better readability */
        padding: 100px 20px;
    }

    /* Popular Services Section */
    .services-overview h2 {
        font-size: 36px;
        color: #ffcc00; /* Bright color for better visibility */
        font-family: 'Arial', sans-serif;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); /* Add shadow for better readability */
    }

    .services-carousel .service-card h3 {
        font-size: 24px;
        color: #ffcc00; /* Matching color with the section title */
        font-family: 'Arial', sans-serif;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    }

    .services-carousel .service-card p {
        font-size: 16px;
        color: whitesmoke /* Keep text readable */
    }

    /* Button Style */
    .btn {
        background-color: #ffcc00;
        color: #333;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
    }

    .btn:hover {
        background-color: #ff9900;
    }
</style>

</head>
<body>
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Your Wellness Journey Starts Here</h1>
            <p>Experience Relaxation and Rejuvenation like never before.</p>
            <div class="cta-buttons">
                <a href="booking.php" class="btn">Book Now</a>
                <a href="services.php" class="btn">View Services</a>
            </div>
        </div>
    </section>

    <!-- Services Overview Section -->
    <section class="services-overview">
        <h2>Popular Services</h2>
        <div class="services-carousel">
            <div class="service-card">
                <img src="assets/relaxing.jpg" alt="Service 1">
                <h3>Relaxing Massage</h3>
                <p>Feel the tension melt away with our signature massage therapy.</p>
                <p><strong>Price:</strong> 500 PHP</p>
                <a href="services.php" class="btn">View Service</a>
            </div>
            <div class="service-card">
                <img src="assets/facial.jpg" alt="Service 2">
                <h3>Facial Treatment</h3>
                <p>Rejuvenate your skin with our luxurious facial treatment.</p>
                <p><strong>Price:</strong> 600 PHP</p>
                <a href="services.php" class="btn">View Service</a>
            </div>
            <div class="service-card">
                <img src="assets/hot.jpg" alt="Service 3">
                <h3>Hot Stone Therapy</h3>
                <p>Relax with a soothing hot stone massage experience.</p>
                <p><strong>Price:</strong> 700 PHP</p>
                <a href="services.php" class="btn">View Service</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <h2>What Our Clients Say</h2>
        <div class="testimonial-slider">
            <div class="testimonial-card">
                <img src="assets/maris.jpg" alt="Client 1">
                <p>"The best spa experience I’ve had. Highly recommend the massage therapy!"</p>
                <p><strong>Rating:</strong> ⭐⭐⭐⭐</p>
                <p>- Maris R.</p>
            </div>
            <div class="testimonial-card">
                <img src="assets/anth.jpg" alt="Client 2">
                <p>"A relaxing atmosphere and friendly staff. My skin feels amazing after the facial."</p>
                <p><strong>Rating:</strong> ⭐⭐⭐</p>
                <p>- Anthony J.</p>
            </div>
            <div class="testimonial-card">
                <img src="assets/rico.jpg" alt="Client 3">
                <p>"I left feeling totally rejuvenated. I’ll definitely book again!"</p>
                <p><strong>Rating:</strong> ⭐⭐⭐⭐⭐</p>
                <p>- Rico B.</p>
            </div>
        </div>
    </section>

    <!-- Final Call to Action -->
    <section class="cta-final">
        <h2>Ready to Start Your Wellness Journey?</h2>
        <p>Sign up today and book your first session to experience ultimate relaxation.</p>
        <div class="cta-buttons">
            <a href="signup.php" class="btn">Create Account</a>
            <a href="login.php" class="btn">Login</a>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>

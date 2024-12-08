<?php
// Start the session to check if the user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - CIT17 Wellness</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        /* Adding the animated GIF background */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('assets/welcome.gif') no-repeat center center fixed;
            background-size: cover; /* Ensure the GIF covers the entire viewport */
        }

        .welcome {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Full viewport height */
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7); /* Slight overlay for readability */
            border-radius: 10px;
        }

        .welcome h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .welcome p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section class="welcome">
        <h1>Welcome, <?php echo $_SESSION['full_name']; ?>!</h1>
        
        <p>We're so glad you're here! At CIT17 Wellness, we believe in providing personalized services that support your health and well-being. Whether you're looking for a relaxing massage, fitness training, or therapeutic treatments, we've got something for everyone.</p>
        
        <p>Our services are designed to help you feel your best and enjoy every step of your wellness journey. With professional therapists and state-of-the-art facilities, you're in great hands. Our goal is to make every visit a memorable experience!</p>

        <p>Take your time to explore our wide range of services. You're one step closer to improving your health, relaxing your mind, and rejuvenating your body. Are you ready to get started?</p>
        
        <p>Click below to view our services and take the first step toward a healthier, happier you!</p>
        
        <!-- Button to View Services -->
        <a href="services.php" class="btn">View Services</a>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>
</html>

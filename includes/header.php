<header>
    <div class="container">
        <a href="index.php" class="logo">Booking System</a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <?php 
                if (isset($_SESSION['user_id'])) {
                    echo '<li><a href="user-dashboard.php">Dashboard</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="login.php">Login</a></li>';
                    echo '<li><a href="register.php">Register</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</header>
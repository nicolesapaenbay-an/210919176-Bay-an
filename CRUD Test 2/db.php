<?php
$servername = "localhost"; // Usually "localhost" on XAMPP
$username = "root";        // Default MySQL username for XAMPP
$password = "";            // Default MySQL password (empty for XAMPP)
$dbname = "car_inventory_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

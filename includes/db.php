<?php
$servername = "localhost";
$username = "root"; // Change if using a different username
$password = ""; // Change if using a password
$dbname = "cit17_final_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

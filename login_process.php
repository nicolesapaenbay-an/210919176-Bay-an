<?php
session_start(); // Start a session to store login information

include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        // User found, fetch the user data
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, log the user in
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role']; // Store the role in session

            // Redirect to a welcome page or dashboard
            header("Location: welcome.php"); // Change this to dashboard.php or appropriate page
        } else {
            // Incorrect password
            echo "Incorrect password. Please try again.";
        }
    } else {
        // User not found
        echo "No account found with that email address.";
    }
}
?>

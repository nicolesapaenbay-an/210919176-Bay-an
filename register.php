<?php
session_start(); // Start the session

include 'includes/database.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Sanitize and validate input
    $fullname = mysqli_real_escape_string($conn, $fullname);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $password = mysqli_real_escape_string($conn, $password);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $sql = "SELECT * FROM Users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $error = "Email already exists.";
    } else {
        // Insert new user into the database
        $sql = "INSERT INTO Users (full_name, email, phone_number, password, role) 
                VALUES ('$fullname', '$email', '$phone', '$hashedPassword', 'customer')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['role'] = 'customer';

            // Redirect to dashboard
            header('Location: user-dashboard.php');
            exit;
        } else {
            $error = "Error registering user: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <div class="container"></div>
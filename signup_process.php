<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $full_name = trim($_POST['full_name']);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $phone_number = trim($_POST['phone_number']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm-password']);

    // Validate required fields
    if (empty($full_name) || !$email || empty($phone_number) || empty($password) || empty($confirm_password)) {
        die("All fields are required. Please go back and try again.");
    }

    // Validate password match
    if ($password !== $confirm_password) {
        die("Passwords do not match! Please go back and try again.");
    }

    // Validate password strength (minimum 8 characters, at least one letter, one number, and one special character)
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        echo "
            <div style='
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #f8d7da;
                color: #721c24;
                font-size: 18px;
                font-family: Arial, sans-serif;
                text-align: center;
                padding: 20px;
                border: 1px solid #f5c6cb;
                border-radius: 5px;
                margin: auto;
                max-width: 600px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            '>
                Password must be at least 8 characters long, include at least one letter, one number, and one special character.
            </div>";
        exit();
    }
    

    // Check if the email is already registered using prepared statements
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists
        die("Email is already taken. Please use a different email.");
    }
    $stmt->close();

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Assign a default role of 'customer'
    $role = 'customer';

    // Insert the user into the database
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, phone_number, password, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $full_name, $email, $phone_number, $hashed_password, $role);

    if ($stmt->execute()) {
        // Success! Redirect to the welcome page
        header("Location: welcome.php");
        exit(); // Stop further code execution after redirect
    } else {
        // Log the error for debugging
        error_log("Database Error: " . $stmt->error);
        die("Something went wrong. Please try again later.");
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Validator</title>
</head>
<body>

    <h1>Activity 2: Password Validator</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="password">Please enter the password:</label><br>
        <input type="password" id="password" name="password" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    // Set the correct password
    $correctPassword = "password123";

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST["password"];

        if ($password === $correctPassword) {
            echo "Access Granted.";
        } else {
            echo "Incorrect password.";
        }
    }
    ?>

</body>
</html>
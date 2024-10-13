<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop Control</title>
</head>
<body>

    <h1>Activity 4: Loop Control with break and continue</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <button type="submit">Generate Output</button>
    </form>

    <?php
    // Database connection settings (replace with your actual credentials)
    $servername = "localhost";
    $username = "your_actual_username"; // Replace with your username
    $password = "your_actual_password"; // Replace with your password
    $dbname = "your_actual_database_name"; // Replace with your database name

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Generate and store loop output in the database
        for ($i = 1; $i <= 10; $i++) {
            if ($i == 5) {
                continue; // Skip the number 5
            }
            if ($i == 8) {
                break; // Stop the loop at 8
            }

            // Prepare the SQL INSERT statement
            $sql = "INSERT INTO loop_output (number) VALUES (?)";
            $stmt = mysqli_prepare($conn, $sql);

            // Bind the variable to the prepared statement
            mysqli_stmt_bind_param($stmt, "i", $i);

            // Execute the prepared statement
            mysqli_stmt_execute($stmt);

            // Close the prepared statement
            mysqli_stmt_close($stmt);

            echo $i . " ";
        }

        echo "<br>Loop output stored in the database.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

</body>
</html>
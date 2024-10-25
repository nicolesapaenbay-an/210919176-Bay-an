<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Input Example</title>
</head>
<body>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="fname">Enter Your First Name:</label><br>
        <input type="text" id="fname" name="fname"><br><br>

        <label for="lname">Enter Your Last Name:</label><br>
        <input type="text" id="lname" name="lname"><br><br>

        <label for="age">Enter Your Age:</label><br>
        <input type="number" id="age" name="age"><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capture the input from the form
        $fname = htmlspecialchars($_POST['fname']);  // Sanitize user input
        $lname = htmlspecialchars($_POST['lname']);
        $age = htmlspecialchars($_POST['age']);

        // Display the captured input
        echo "<h2>Your Input:</h2>";
        echo "First Name: " . $fname . "<br>";
        echo "Last Name: " . $lname . "<br>";
        echo "Age: " . $age . "<br>";
    }
    ?>

</body>
</html>
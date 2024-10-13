<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Counter</title>
</head>
<body>

    <h1>Activity 1: Number Counter</h1>

    <!-- Combined Form for Numbers 1 to 10 and Even Numbers 1 to 20 -->
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="upperLimit1">Enter the upper limit (for numbers 1 to 10):</label><br>
        <input type="number" id="upperLimit1" name="upperLimit1" value="<?php echo isset($_GET['upperLimit1']) ? $_GET['upperLimit1'] : ''; ?>">
        <br><br>

        <label for="upperLimit2">Enter the upper limit (for even numbers 1 to 20):</label><br>
        <input type="number" id="upperLimit2" name="upperLimit2" value="<?php echo isset($_GET['upperLimit2']) ? $_GET['upperLimit2'] : ''; ?>">
        <br><br>

        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
        // Check if the form was submitted
        if (isset($_GET['submit'])) {
            // Printing Numbers 1 to 10
            if (isset($_GET['upperLimit1'])) {
                $upperLimit1 = $_GET['upperLimit1'];

                echo "// Printing Numbers 1 to 10 (User Input)<br>";
                echo "Enter the upper limit: " . htmlspecialchars($upperLimit1) . "<br>";

                $i = 1;
                while ($i <= $upperLimit1) {
                    echo $i . " ";
                    $i++;
                }
                echo "<br><br>";
            }

            // Printing Even Numbers 1 to 20
            if (isset($_GET['upperLimit2'])) {
                $upperLimit2 = $_GET['upperLimit2'];

                echo "// Printing Even Numbers 1 to 20 (User Input)<br>";
                echo "Enter the upper limit: " . htmlspecialchars($upperLimit2) . "<br>";

                $i = 2;
                while ($i <= $upperLimit2) {
                    echo $i . " ";
                    $i += 2;
                }
                echo "<br><br>";
            }
        }
    ?>

    <!-- Reset Button -->
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <button type="submit" name="reset">Restart</button>
    </form>

</body>
</html>

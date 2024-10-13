<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
</head>
<body>

    <h1>Activity 3: Multiplication Table</h1>

    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="number">Enter a number:</label><br>
        <input type="number" id="number" name="number" required>
        <button type="submit">Generate Table</button>
    </form>

    <?php
    if (isset($_GET['number'])) {
        $number = $_GET['number'];

        echo "<h2>Multiplication Table for " . $number . "</h2>";
        echo "<table border='1'>";

        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>";
            echo "<td>" . $number . " x " . $i . "</td>";
            echo "<td>" . $number * $i . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>

</body>
</html>
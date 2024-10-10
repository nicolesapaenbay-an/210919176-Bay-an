
//Multiplication Table

<?php
echo "Enter the number: ";
$number = trim(fgets(STDIN)); // Read user input

for ($i = 1; $i <= 10; $i++) {
    echo $number . " x " . $i . " = " . ($number * $i) . "\n";
}
?>
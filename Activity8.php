
//Factorial Calculator

<?php
echo "Enter a number: ";
$number = trim(fgets(STDIN)); // Read user input

$factorial = 1;
for ($i = 1; $i <= $number; $i++) {
    $factorial *= $i;
}
echo "Factorial of " . $number . " is: " . $factorial;
?>
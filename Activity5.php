
//Sum of Numbers

<?php
echo "Enter the upper limit: ";
$upperLimit = trim(fgets(STDIN)); // Read user input

$i = 1;
$sum = 0;
while ($i <= $upperLimit) {
    $sum += $i;
    $i++;
}
echo "The sum of numbers from 1 to " . $upperLimit . " is: " . $sum;
?>
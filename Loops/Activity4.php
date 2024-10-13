<?php
echo "Enter the upper limit: ";
$upperLimit = trim(fgets(STDIN)); // Read user input

for ($i = 1; $i <= $upperLimit; $i++) {
    if ($i == 5) {
        continue; // Skip the number 5
    }
    echo $i . " "; // Print the number before checking for the break condition
    if ($i == 8) {
        break; // Stop the loop when $i is 8
    }
}
?>
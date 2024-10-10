
//Loop Control with break and conntinue

<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        continue; // Skip the number 5
    }
    echo $i . " "; // Print the number before checking for the break condition
    if ($i == 8) {
        break; // Stop the loop when $i is 8
    }
}
?>
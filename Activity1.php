
//Number Counter

// Printing Numbers 1 to 10 (User Input)
<?php
echo "Enter the upper limit: ";
$upperLimit = trim(fgets(STDIN)); // Read user input

$i = 1;
while ($i <= $upperLimit) {
    echo $i . " ";
    $i++;
}
?>

//Printing Even Numbers 1 to 20 (User Input)
<?php
echo "Enter the upper limit: ";
$upperLimit = trim(fgets(STDIN)); // Read user input

$i = 2;
while ($i <= $upperLimit) {
    echo $i . " ";
    $i += 2; // Increment by 2 to get only even numbers
}
?>

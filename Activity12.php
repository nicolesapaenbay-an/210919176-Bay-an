
//Reverse a String

<?php
echo "Enter a string: ";
$string = trim(fgets(STDIN)); // Read user input

$reversedString = "";
for ($i = strlen($string) - 1; $i >= 0; $i--) {
    $reversedString .= $string[$i];
}
echo "Input: " . $string . "\n";
echo "Output: " . $reversedString;
?>
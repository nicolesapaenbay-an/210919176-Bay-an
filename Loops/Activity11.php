
//Fibonacci Sequence

<?php
echo "Enter the number of terms: ";
$terms = trim(fgets(STDIN)); // Read user input

$a = 0;
$b = 1;
echo $a . " " . $b . " ";
for ($i = 2; $i < $terms; $i++) {
    $c = $a + $b;
    echo $c . " ";
    $a = $b;
    $b = $c;
}
?>

//Prime Number Checker

<?php
echo "Enter a number: ";
$number = trim(fgets(STDIN)); // Read user input

$isPrime = true;
if ($number <= 1) {
    $isPrime = false;
} else {
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            $isPrime = false;
            break;
        }
    }
}
if ($isPrime) {
    echo $number . " is a prime number.";
} else {
    echo $number . " is not a prime number.";
}
?>
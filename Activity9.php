
//FizzBuzz Challenge

<?php
echo "Enter the upper limit: ";
$upperLimit = trim(fgets(STDIN)); // Read user input

for ($i = 1; $i <= $upperLimit; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz" . "\n";
    } else if ($i % 3 == 0) {
        echo "Fizz" . "\n";
    } else if ($i % 5 == 0) {
        echo "Buzz" . "\n";
    } else {
        echo $i . "\n";
    }
}
?>
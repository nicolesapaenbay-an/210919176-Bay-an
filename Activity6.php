
//Array Iteration with foreach

<?php
echo "Enter your 5 favorite movies separated by commas: ";
$moviesInput = trim(fgets(STDIN));
$movies = explode(",", $moviesInput); // Split the input string into an array

$i = 1;
foreach ($movies as $movie) {
    echo $i . ". " . trim($movie) . "\n";
    $i++;
}
?>
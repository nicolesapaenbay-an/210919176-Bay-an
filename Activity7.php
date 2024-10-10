
//Key-Value Pairs

<?php
echo "Enter the student's Name: ";
$name = trim(fgets(STDIN));

echo "Enter the student's Age: ";
$age = trim(fgets(STDIN));

echo "Enter the student's Grade: ";
$grade = trim(fgets(STDIN));

echo "Enter the student's City: ";
$city = trim(fgets(STDIN));

$student = ["Name" => $name, "Age" => $age, "Grade" => $grade, "City" => $city];

echo "\n"; // Add a newline for spacing

foreach ($student as $key => $value) {
    echo $key . ": " . $value . "\n";
}
?>

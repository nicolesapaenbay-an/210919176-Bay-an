
//Password Validator

<?php
$correctPassword = "password123"; // Set the correct password
$password = "";

do {
    echo "Please enter the password: ";
    $password = trim(fgets(STDIN));
    if ($password !== $correctPassword) {
        echo "Incorrect password. ";
    }
} while ($password !== $correctPassword);
echo "Access Granted.";
?>
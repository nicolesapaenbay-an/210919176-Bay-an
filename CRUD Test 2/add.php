<?php
include 'db.php';

if (isset($_POST['create'])) {
    $car_model = $_POST['car_model'];
    $year = $_POST['year'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $supplier = $_POST['supplier'];

    $sql = "INSERT INTO car_inventory (car_model, year, quantity, price, supplier) VALUES ('$car_model', '$year', '$quantity', '$price', '$supplier')";
    if ($conn->query($sql) === TRUE) {
        echo "New car added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: index.php"); // Redirect back to the main page
exit;
?>

<?php
include 'db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $car_model = $_POST['car_model'];
    $year = $_POST['year'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $supplier = $_POST['supplier'];

    $sql = "UPDATE car_inventory SET car_model='$car_model', year='$year', quantity='$quantity', price='$price', supplier='$supplier' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Car updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: index.php"); // Redirect back to the main page
exit;
?>

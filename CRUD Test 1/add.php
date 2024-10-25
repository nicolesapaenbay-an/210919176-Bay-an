<?php
include 'db.php';

if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO inventory (name, quantity, price) VALUES ('$name', '$quantity', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "New item created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: index.php"); // Redirect back to the main page
exit;
?>

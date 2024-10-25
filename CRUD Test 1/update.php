<?php
include 'db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "UPDATE inventory SET name='$name', quantity='$quantity', price='$price' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Item updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: index.php"); // Redirect back to the main page
exit;
?>

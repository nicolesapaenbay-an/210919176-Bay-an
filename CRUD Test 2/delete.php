<?php
include 'db.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM car_inventory WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Car deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: index.php"); // Redirect back to the main page
exit;
?>

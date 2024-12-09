<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];

    $query = "INSERT INTO services (name, description, price, duration) 
              VALUES ('$name', '$description', $price, $duration)";
    if (mysqli_query($conn, $query)) {
        echo "Service added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Service Name" required><br>
    <textarea name="description" placeholder="Service Description" required></textarea><br>
    <input type="number" name="price" placeholder="Price" required><br>
    <input type="number" name="duration" placeholder="Duration (minutes)" required><br>
    <button type="submit">Add Service</button>
</form>

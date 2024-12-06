<?php
include 'includes/database.php';

// Fetch services from the database
$sql = "SELECT * FROM Services";
$result = $conn->query($sql);

// Check if there are any services
if ($result->num_rows > 0) {
    $services = [];
    while ($row = $result->fetch_assoc()) {
        $services[] = $row;
    }

    // Encode the services data as JSON
    echo json_encode($services);
} else {
    echo json_encode([]); // Return an empty array if no services found
}

$conn->close();
?>
<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Inventory CRUD System</title>
</head>
<body>

    <h2>Car Inventory CRUD System</h2>

    <!-- Form to Add New Car -->
    <form action="add.php" method="post">
        <input type="text" name="car_model" placeholder="Car Model" required>
        <input type="number" name="year" placeholder="Year" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="number" step="0.01" name="price" placeholder="Price (₱)" required>
        <input type="text" name="supplier" placeholder="Supplier">
        <button type="submit" name="create">Add Car</button>
    </form>

    <!-- Search Form -->
    <h3>Search Cars</h3>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search by Car Model">
        <button type="submit">Search</button>
    </form>

    <h3>Car Inventory List</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Car Model</th>
            <th>Year</th>
            <th>Quantity</th>
            <th>Price (₱)</th> <!-- Price in Philippine Pesos -->
            <th>Supplier</th>
            <th>Date Added</th>
            <th>Actions</th>
        </tr>

        <?php
        // Initialize search variable
        $search_query = '';

        // Check if a search term has been submitted
        if (isset($_GET['search'])) {
            $search_query = $_GET['search'];
        }

        // Fetch cars from the car_inventory table with optional search filtering
        $sql = "SELECT * FROM car_inventory";
        if (!empty($search_query)) {
            $sql .= " WHERE car_model LIKE '%" . $conn->real_escape_string($search_query) . "%'";
        }
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['car_model']}</td>
                        <td>{$row['year']}</td>
                        <td>{$row['quantity']}</td>
                        <td>₱" . number_format($row['price'], 2) . "</td> <!-- Price formatting -->
                        <td>{$row['supplier']}</td>
                        <td>{$row['date_added']}</td>
                        <td>
                            <form action='update.php' method='post' style='display:inline-block;'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <input type='text' name='car_model' value='{$row['car_model']}' required>
                                <input type='number' name='year' value='{$row['year']}' required>
                                <input type='number' name='quantity' value='{$row['quantity']}' required>
                                <input type='number' step='0.01' name='price' value='{$row['price']}' required>
                                <input type='text' name='supplier' value='{$row['supplier']}'>
                                <button type='submit' name='update'>Update</button>
                            </form>
                            <form action='delete.php' method='post' style='display:inline-block;'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button type='submit' name='delete'>Delete</button>
                            </form>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No cars found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>

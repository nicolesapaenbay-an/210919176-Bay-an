<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory CRUD System</title>
</head>
<body>
    <h2>Inventory CRUD System</h2>

    <!-- Form to Add New Item -->
    <form action="add.php" method="post">
        <input type="text" name="name" placeholder="Item Name" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <button type="submit" name="create">Add Item</button>
    </form>

    <h3>Inventory List</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>

        <?php
        // Fetch all items from the inventory table
        $sql = "SELECT * FROM inventory";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['price']}</td>
                        <td>
                            <form action='update.php' method='post' style='display:inline-block;'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <input type='text' name='name' value='{$row['name']}' required>
                                <input type='number' name='quantity' value='{$row['quantity']}' required>
                                <input type='number' step='0.01' name='price' value='{$row['price']}' required>
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
            echo "<tr><td colspan='5'>No items found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>

<?php
// Include database connection
include('db_connect.php');

// Fetch all products from the database
$query = "SELECT * FROM products";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
        <thead>
            <tr>
                <th>Product Code</th>
                <th>Name</th>
                <th>Version</th>
                <th>Release Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['product_code']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['version']); ?></td>
                <td><?php echo htmlspecialchars($row['release_date']); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <br>
    <a href="add_product.php">Add Another Product</a>
</body>
</html>
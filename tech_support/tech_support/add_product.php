<?php
// Include database connection
include('db_connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $product_code = $_POST['product_code'];
    $product_name = $_POST['name'];
    $version = $_POST['version'];
    $release_date = $_POST['release_date'];
    
    // Validate inputs (ensure required fields are filled)
    if (empty($product_code) || empty($product_name) || empty($version) || empty($release_date)) {
        // Redirect to error page with a message
        header("Location: error.php?message=Please fill in all required fields.");
        exit();
    }

    // Insert product into the database
    $query = "INSERT INTO products (product_code, name, version, release_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $product_code, $product_name, $version, $release_date);

    if ($stmt->execute()) {
        // Redirect to product list after successful addition
        header("Location: product_list.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add a New Product</h1>
    <form action="add_product.php" method="POST">
        <label for="product_code">Product Code:</label>
        <input type="text" id="product_code" name="product_code" required><br><br>

        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="version">Version:</label>
        <input type="text" id="version" name="version" required><br><br>

        <label for="release_date">Release Date:</label>
        <input type="date" id="release_date" name="release_date" required><br><br>

        <input type="submit" value="Add Product">
    </form>

    <br>
    <a href="product_list.php">View Product List</a>
</body>
</html>

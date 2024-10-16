<?php
if (isset($_GET['message'])) {
    echo "<h1>Error: " . htmlspecialchars($_GET['message']) . "</h1>";
}
?>
<a href='add_product.php'>Go back</a>

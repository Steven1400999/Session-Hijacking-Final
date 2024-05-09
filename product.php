<?php
session_start();
require_once 'db_config.php';

$product_id = $_GET['id']; 

$query = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    echo "<h1>" . htmlspecialchars($product['product']) . "</h1>";
    echo "<p>" . htmlspecialchars($product['description']) . "</p>"; 
    echo "Product not found."; 
}
?>

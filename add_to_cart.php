<?php
session_start();

include 'database.php';

$user_id = $_SESSION['user_id']; // Set user ID dynamically if using authentication
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];

$checkCart = $conn->query("SELECT * FROM cart WHERE product_id = $product_id AND user_id = $user_id");

if ($checkCart->num_rows > 0) {
    $conn->query("UPDATE cart SET quantity = quantity + 1 WHERE product_id = $product_id AND user_id = $user_id");
} else {
    $conn->query("INSERT INTO cart (product_id, product_name, product_price, user_id) VALUES ($product_id, '$product_name', $product_price, $user_id)");
}



echo "success";
$conn->close();
?>

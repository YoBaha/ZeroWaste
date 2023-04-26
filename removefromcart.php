<?php
session_start();

// Get the product ID to remove from the cart
$product_id = $_POST['product_id'];

// Remove the product from the cart session variable
unset($_SESSION['cart'][$product_id]);

// Redirect back to mycart.php
header('Location: mycart.php');
exit();
?>

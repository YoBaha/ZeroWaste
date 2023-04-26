<?php
session_start();

if (isset($_POST['add_to_cart'])) {
  $product_id = $_POST['product_id'];
  if (isset($_SESSION['cart'][$product_id])) {
    // If the item is already in the cart, increment the quantity
    $_SESSION['cart'][$product_id]++;
  } else {
    // Otherwise, add a new entry with quantity 1
    $_SESSION['cart'][$product_id] = 1;
  }
}

header("Location: mycart.php");
exit();
?>

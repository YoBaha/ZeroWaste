<?php 
require_once 'config.php';
$db = config::getConnexion();

// Get the product ID from the URL parameter
if (!isset($_GET['id'])) {
  echo "Product ID not provided.";
  exit();
}
$id = $_GET['id'];

// Retrieve the product details from the database
$sql = "SELECT title, price, image FROM mycart WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$product) {
  echo "Product not found.";
  exit();
}

// Display the product details on the page
?>
<div class="product-details">
  <h1><?= $product['title'] ?></h1>
  <img src="<?= BASE_URL ?><?= $product['image'] ?>" alt="<?= $product['title'] ?>">
  <?php if ($product['price']): ?>
    <p>Price: $<?= number_format($product['price'], 2) ?></p>
  <?php else: ?>
    <p>Price not available.</p>
  <?php endif; ?>
</div>

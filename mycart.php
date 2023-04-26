<?php


session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}



require_once 'config.php';
$db = config::getConnexion();

// Check if the current page is the cart page
$is_cart_page = basename($_SERVER['PHP_SELF']) === 'mycart.php';

// Retrieve the products from the database based on the selected IDs
$selected_ids = array_keys($_SESSION['cart']);
$sql = "SELECT ProductID, title, price, image FROM mycart WHERE ProductID IN (".implode(',', $selected_ids).")";

$stmt = $db->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if the "sort" button is pressed
if (isset($_POST['sort'])) {
    // Sort the products array in descending order by price
    usort($products, function($a, $b) {
        return $b['price'] - $a['price'];
    });
}
?>
<title>Zero Waste</title>
<h2>My Cart</h2>
<button onclick="window.location.href='index.php'">Go To Home</button>

	<style>
		/* Style for the waste word */
		.orange {
			color: orange;
			font-weight: bold;
            font-size: 50px;
		}

		/* Style for the logo */
		.logo {
			width: 50px;
			height: 50px;
			margin-left: 10px;
		}
	</style>
    <div style="text-align: center;">
    <h2>Zero<span class="orange">Waste</span> <img src="http://localhost/mycartcode/icon.png" alt="Logo" class="logo"></h2>

</div>

<div class="products-container">
  <?php foreach ($products as $product): ?>
    <div class="product-item">
    <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" alt="<?= $product['title'] ?>">


  <h3><?= $product['title'] ?></h3>
  <p>Price: $<?= number_format($product['price'], 2) ?></p>
  <p>Quantity: <?= $_SESSION['cart'][$product['ProductID']] ?></p>
  <?php if (!$is_cart_page): ?>
  <form action="addtocart.php" method="post">
    <input type="hidden" name="product_id" value="<?= $product['ProductID'] ?>">
    <input type="submit" name="add_to_cart" value="Add to Cart">
  </form>
  <?php else: ?>
  <form action="removefromcart.php" method="post">
    <input type="hidden" name="product_id" value="<?= $product['ProductID'] ?>">
    <input type="submit" name="remove_from_cart" value="Remove from Cart">
  </form>
  <?php endif; ?>
</div>

  <?php endforeach; ?>
</div>

<?php
// Calculate the total price of the items in the cart
$total_price = 0;
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    $sql = "SELECT price FROM mycart WHERE ProductID = :product_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $price = $stmt->fetchColumn();
    $total_price += $price * $quantity;
}
?>

<div class="cart-buttons">
  <form action="" method="post">
    <input type="submit" name="sort" value="Sort">
  </form>

</div>

<script>
    // Check if the "sort" button is pressed
if (isset($_POST['sort'])) {
    // Sort the products array in descending order by price
    usort($products, function($a, $b) {
        return $b['price'] - $a['price'];
    });
}
</script>

<div class="cart-total">
  <p>Total Price: $<?= number_format($total_price, 2) ?></p>
</div>


<style>
    .cart-total {
  font-size: 24px;
}


.cart-buttons input[type="submit"][name="remove_from_cart"] {
  background-color: lightblue;
  color: white;
}


.products-container {
  display: flex;
  flex-wrap: wrap;
}

.product-item {
  width: 25%;
  padding: 10px;
  box-sizing: border-box;
}
</style>

<div class="cart-buttons">
  <form action="payment.php" method="post">
    <input type="submit" name="proceed_to_payment" value="Proceed to Payment">
  </form>
</div>



<style>
    .cart-buttons input[type="submit"][name="sort"] {
  background-color: blue;
  color: white;
}

.cart-buttons {
  text-align: center;
  margin-top: 20px;
}

.cart-buttons input[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

</style>




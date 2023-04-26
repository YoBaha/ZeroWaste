<?php
session_start();

require_once 'config.php';
$db = config::getConnexion();

// Retrieve the products from the database based on the selected IDs
$selected_ids = array_keys($_SESSION['cart']);
$sql = "SELECT ProductID, title, price, quantity FROM mycart WHERE ProductID IN (".implode(',', $selected_ids).")";

$stmt = $db->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate the total price of the items in the cart
$total_price = 0;
foreach ($products as $product) {
    $total_price += $product['price'] * $_SESSION['cart'][$product['ProductID']];
}

?>
<title>Zero Waste</title>
<h2>Your invoice</h2>

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


<table>
  <tr>
    <th>Product ID</th>
    <th>Title</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total Price</th>
  </tr>
  <?php foreach ($products as $product): ?>
  <tr>
    <td><?= $product['ProductID'] ?></td>
    <td><?= $product['title'] ?></td>
    <td>$<?= number_format($product['price'], 2) ?></td>
    <td><?= $_SESSION['cart'][$product['ProductID']] ?></td>
    <td>$<?= number_format($product['price'] * $_SESSION['cart'][$product['ProductID']], 2) ?></td>
  </tr>
  <?php endforeach; ?>
  <tr>
    <td colspan="4">Total Price:</td>
    <td>$<?= number_format($total_price, 2) ?></td>
  </tr>
</table>




<script>
    
function generatePDF() {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'generate_pdf.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // PDF file generated successfully, show a download link or do other stuff
      console.log('PDF file generated successfully!');
    }
  };
  var selectedIDs = <?php echo json_encode($selected_ids) ?>;
  var data = 'selectedIDs=' + encodeURIComponent(JSON.stringify(selectedIDs));
  xhr.send(data);
}
</script>
<button onclick="window.location.href='generate_pdf.php'" style="background-color: lightcoral;">Generate PDF</button>
<button onclick="window.location.href='index.php'">Go To Home</button>


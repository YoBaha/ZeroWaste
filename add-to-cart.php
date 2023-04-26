<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $product_id = $_POST['ProductID'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $total_price = $_POST['TotalPrice'];
  $product_name = $_POST['ProductName'];

  $conn = config::getConnexion();
  $stmt = $conn->prepare('INSERT INTO mycart (product_id, product_name, quantity, price, total_price) VALUES (?, ?, ?, ?, ?)');
  $stmt->execute([$product_id, $product_name, $quantity, $price, $total_price]);

  if ($stmt->rowCount() > 0) {
    $response = array('success' => true);
  } else {
    $response = array('success' => false);
  }

  echo json_encode($response);
}
?>



<script>
  function addToCart() {
    const form = document.getElementById('add-to-cart-form');
    const formData = new FormData(form);
    fetch('/add-to-cart.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('Product added to mycart successfully.');
        form.reset();
      } else {
        alert('Error adding product to mycart.');
      }
    })
    .catch(error => console.error(error));
  }
</script>


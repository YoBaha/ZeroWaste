<form id="add-to-cart-form">
  <input type="hidden" name="ProductID" value="123">
  <input type="number" name="quantity" value="1" min="1">
  <input type="number" name="price" value="10.99" step="0.01" readonly>
  <input type="number" name="TotalPrice" value="10.99" step="0.01" readonly>
  <input type="text" name="ProductName" value="ProductName" readonly>
  <button type="submit">Add to cart</button>
</form>
<!--js-->
<script>
const form = document.getElementById('add-to-cart-form');
form.addEventListener('submit', (event) => {
  event.preventDefault();
  const formData = new FormData(form);
  fetch('add-to-cart.php', {
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
});
</script>

<?php
  class config {
    private static $pdo = NULL;

    public static function getConnexion() {
      if (!isset(self::$pdo)) {
        try{
          self::$pdo = new PDO('mysql:host=localhost;dbname=mycart', 'root', '',
          [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
          ]);
        }catch(Exception $e){
          die('Erreur: '.$e->getMessage());
        }
      }
      return self::$pdo;
    }
  }
?>







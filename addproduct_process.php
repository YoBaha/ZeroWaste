<?php
require_once 'config.php';
$db = config::getConnexion();
?>

<form action="addproduct_process.php" method="post" enctype="multipart/form-data">
  <label for="title">Title:</label>
  <input type="text" id="title" name="title" required><br>

  <label for="price">Price:</label>
  <input type="number" id="price" name="price" step="0.01" required><br>

  <label for="image">Image:</label>
  <input type="file" id="image" name="image" accept="image/*" required><br>

  <input type="submit" name="submit" value="Add Product">

</form>

<?php
// Check if the form was submitted
if (isset($_POST['submit'])) {
  // Get the form data
  $title = $_POST['title'];
  $price = $_POST['price'];
  $image = $_FILES['image']['name'];

  // Validate the form data
  // ...

  // Upload the image to the server
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

  // Insert the new product into the database
  $sql = "INSERT INTO mycart (title, price, image) VALUES (:title, :price, :image)";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':price', $price);
  $imageData = file_get_contents($_FILES['image']['tmp_name']);
  $stmt->bindParam(':image', $imageData, PDO::PARAM_LOB);
  $stmt->execute();

  // Redirect the user back to the home page
  header("Location: index.php");
  exit();
}
?>


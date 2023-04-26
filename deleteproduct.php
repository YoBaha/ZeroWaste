<?php
require_once 'config.php';
$db = config::getConnexion();

// Check if the delete button was clicked
if (isset($_POST['delete'])) {
    // Get the ID of the product to be deleted
    $id = $_POST['ProductID'];

    // Delete the product from the database
    $sql = "DELETE FROM mycart WHERE ProductID = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Redirect the user back to the home page
    header("Location: index.php");
    exit();
}
?>

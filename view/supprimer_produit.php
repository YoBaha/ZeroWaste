<?php
    require_once '../view/include/database.php';
    $id = $_GET['id'];
    $sqlState = $pdo->prepare('DELETE FROM produit WHERE id=?');
    $supprime = $sqlState->execute([$id]);
    header('location: ../controller/produits.php');
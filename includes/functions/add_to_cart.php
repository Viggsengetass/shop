<?php
include_once('../config.php');
include_once('../functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = intval($_POST['quantity']);

    addToCart($product_id, $quantity);

    // Redirigez l'utilisateur vers la page du produit ou du panier
    header('Location: ../product.php?id=' . $product_id);
    exit;
}
?>

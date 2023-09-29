<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include_once('../includes/config.php');
include_once('../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = intval($_POST['quantity']);

    // Ajoutez l'article au panier
    addToCart($product_id, $quantity);

    // Redirigez l'utilisateur vers la page du panier
    header('Location: ../cart.php');
    exit;
}

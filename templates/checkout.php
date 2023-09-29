<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include_once('../includes/config.php');
include_once('../includes/functions.php');

session_start();

// Vérifiez si le panier est correctement stocké en session (à des fins de débogage)
if (isset($_SESSION['cart'])) {
    // Affichez le contenu du panier (à des fins de débogage)
    var_dump($_SESSION['cart']);
}

// Appelez la fonction clearCart pour vider le panier
clearCart();

// Redirigez l'utilisateur vers la page d'accueil ou une page de confirmation
header('Location: ../index.php');
exit;

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../includes/config.php');
include_once('../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez si les données du formulaire existent et sont des tableaux
    if (isset($_POST['product_id']) && is_array($_POST['product_id']) && isset($_POST['quantity']) && is_array($_POST['quantity'])) {
        $product_ids = $_POST['product_id'];
        $quantities = $_POST['quantity'];

        // Videz d'abord le panier actuel
        clearCart();

        // Ajoutez les produits mis à jour avec les quantités correctes
        for ($i = 0; $i < count($product_ids); $i++) {
            $product_id = $product_ids[$i];
            $quantity = intval($quantities[$i]);

            if ($quantity > 0) {
                addToCart($product_id, $quantity);
            }
        }

        // Redirigez l'utilisateur vers la page du panier
        header('Location: cart.php');
        exit;
    } else {
        // Les données du formulaire sont incomplètes ou incorrectes
        echo "Les données du formulaire sont incorrectes.";
        var_dump($_POST);
        exit;
    }
}

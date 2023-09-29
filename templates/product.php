<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('../includes/config.php');
include_once('../includes/header.php');
include_once('../includes/functions.php');



if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
} else {
    // Gérer le cas où l'ID du produit n'est pas spécifié
    echo "ID du produit non spécifié.";
    exit; // Sortie pour éviter l'exécution du reste du code
}

$pdo = connectToDB();
$query = "SELECT * FROM product WHERE id = :product_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h2><?php echo $product['title']; ?></h2>
            <p>Description : <?php echo $product['description']; ?></p>
            <p>Prix : <?php echo $product['price']; ?> €</p>
            <!-- Ajoutez ici les autres informations du produit -->
        </div>
    </div>
</div>

<form method="POST" action="add_product.php">
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <input type="number" name="quantity" value="1" min="1">
    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

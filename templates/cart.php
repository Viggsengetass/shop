<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../includes/config.php');
include_once('../includes/header.php');
include_once('../includes/functions.php');

// Initialiser la variable du total du panier
$totalCartAmount = 0;

// Afficher le contenu du panier
?>
<div class="container mt-4">
    <h2>Votre Panier</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Produit</th>
            <th>Description</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['cart'] as $product_id => $quantity): ?>
            <?php
            // Récupérer les informations sur le produit depuis la base de données
            $pdo = connectToDB();
            $query = "SELECT * FROM product WHERE id = :product_id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            // Calculer le total pour ce produit
            $productTotal = $product['price'] * $quantity;
            $totalCartAmount += $productTotal;
            ?>
            <tr>
                <td><?php echo $product['title']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['price']; ?> €</td>
                <td>
                    <form method="POST" action="update_cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <input type="number" name="quantity" value="<?php echo $quantity; ?>" min="1">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </td>
                <td><?php echo $productTotal; ?> €</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Total du Panier : <?php echo $totalCartAmount; ?> €</h4>

    <!-- Bouton "Commander" -->
    <form method="POST" action="checkout.php">
        <button type="submit" class="btn btn-success">Commander</button>
    </form>
</div>

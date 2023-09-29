<?php

function createUser($username, $password)
{
    $pdo = connectToDB();

    try {
        // Vérifiez d'abord si l'utilisateur existe déjà
        $query = "SELECT * FROM user WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            return "L'utilisateur existe déjà.";
        }

        // Hash du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Récupérer la date actuelle au format SQL
        $currentDate = date("Y-m-d H:i:s");

        // Insérer l'utilisateur dans la base de données avec la date de création
        $query = "INSERT INTO user (username, password, created_at) VALUES (:username, :password, :created_at)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $currentDate, PDO::PARAM_STR);
        $stmt->execute();

        return "Inscription réussie. Vous pouvez maintenant vous connecter.";
    } catch (PDOException $e) {
        // En cas d'erreur lors de l'insertion
        return "Erreur : " . $e->getMessage();
    }
}



// Initialisez le panier s'il n'existe pas encore
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Fonction pour ajouter un produit au panier
function addToCart($product_id, $quantity = 1)
{
    // Assurez-vous que la quantité est valide (au moins 1)
    if ($quantity < 1) {
        $quantity = 1;
    }

    // Ajoutez le produit et sa quantité au panier
    $_SESSION['cart'][$product_id] = $quantity;
}

// Fonction pour vider le panier
function clearCart()
{
    // Pour vider le panier
    $_SESSION['cart'] = [];
}





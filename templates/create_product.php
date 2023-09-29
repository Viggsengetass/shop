<?php
// Inclure les fichiers nécessaires
include_once('../includes/config.php');
include_once('../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = floatval($_POST['price']);

    // Connexion à la base de données
    $pdo = connectToDB();

    try {
        // Préparez la requête d'insertion
        $query = "INSERT INTO product (title, description, price) VALUES (:title, :description, :price)";
        $stmt = $pdo->prepare($query);

        // Liez les valeurs aux paramètres de la requête
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);

        // Exécutez la requête
        $stmt->execute();

        // Redirigez l'administrateur vers le tableau de bord après avoir ajouté le produit
        header('Location: dashboard.php');
        exit;
    } catch (PDOException $e) {
        // Gérez les erreurs d'insertion ici
        echo "Erreur d'insertion : " . $e->getMessage();
    }
}
?>

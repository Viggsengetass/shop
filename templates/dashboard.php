<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include_once('../includes/header.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord administrateur</title>
    <!-- Inclure Bootstrap depuis un CDN pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Tableau de bord administrateur</h1>

    <!-- Formulaire pour créer un nouveau produit -->
    <div class="card mt-4">
        <div class="card-header">
            Créer un nouveau produit
        </div>
        <div class="card-body">
            <form action="create_product.php" method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">Titre du produit :</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description :</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prix :</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>
                <!-- Ajoutez d'autres champs pour les informations du produit ici -->

                <button type="submit" class="btn btn-primary">Créer le produit</button>
            </form>
        </div>
    </div>

    <!-- Ajoutez d'autres fonctionnalités du tableau de bord ici... -->
</div>

<!-- Inclure Bootstrap JavaScript depuis un CDN (facultatif) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

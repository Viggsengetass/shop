<!-- header.php -->
<?php
session_start(); // Démarrer la session pour vérifier l'état de connexion

// Vérifier si l'utilisateur est authentifié (connecté)
if (isset($_SESSION['user_id'])) {
    $loggedIn = true;
    $username = $_SESSION['username'];
} else {
    $loggedIn = false;
    $username = ''; // Définir un nom d'utilisateur vide si l'utilisateur n'est pas connecté
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macromania - Accueil</title>
    <!-- Intégrer Bootstrap depuis un CDN pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Accueil</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="cart.php">Panier</a>
        </li>
    </ul>

    <?php if ($loggedIn): ?>
        <span class="navbar-text">
            Connecté en tant que <?= htmlspecialchars($username) ?>
        </span>
        <a class="btn btn-danger ml-2" href="logout.php">Déconnexion</a>
    <?php else: ?>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="login.php">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">add a product</a>
            </li>
        </ul>
    <?php endif; ?>
</nav>

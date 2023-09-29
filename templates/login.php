<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('../includes/config.php');
include_once('../includes/header.php');

include_once('functions_login.php');

// Gérer la soumission du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Utiliser la fonction loginUser pour vérifier l'authentification
    $result = loginUser($username, $password);

    if (is_array($result) && isset($result['user_id'])) {
        // Connexion réussie, stocker l'ID de l'utilisateur en session
        session_start();
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['username'] = $result['username'];

        // Rediriger l'utilisateur vers le tableau de bord
        header('Location: dashboard.php');
        exit;
    } else {
        $loginMessage = $result; // Utiliser le message d'erreur renvoyé par la fonction loginUser
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Inclure Bootstrap depuis un CDN pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Connexion</h2>

                    <?php
                    if (isset($loginMessage)) {
                        echo '<div class="alert ' . (is_array($loginMessage) ? 'alert-success' : 'alert-danger') . '" role="alert">';
                        if (is_array($loginMessage)) {
                            echo 'Connecté en tant que ' . htmlspecialchars($loginMessage['username']);
                        } else {
                            echo htmlspecialchars($loginMessage);
                        }
                        echo '</div>';
                    }
                    ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Inclure Bootstrap JavaScript depuis un CDN (facultatif) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

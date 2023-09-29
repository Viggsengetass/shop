<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('../includes/config.php');
include_once('../includes/functions.php');
include_once('../includes/header.php');

// Gérer la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $message = createUser($username, $password);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macromania - Accueil</title>
    <!-- Intégrer Bootstrap depuis un CDN pour le style -->
    <link href="register.css" rel="stylesheet">

</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">S'inscrire</h2>

                    <?php
                    if (isset($message)) {
                        echo '<div class="alert alert-primary" role="alert">' . $message . '</div>';
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
                            <button>
                                <div class="svg-wrapper-1">
                                    <div class="svg-wrapper">
                                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </div>
                                <span>Send</span>
                            </button>



                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Intégrer Bootstrap JavaScript depuis un CDN (facultatif) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

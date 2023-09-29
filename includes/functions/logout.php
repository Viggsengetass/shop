<?php
session_start(); // Démarrez la session

// Déconnectez l'utilisateur en détruisant la session
session_destroy();

// Redirigez l'utilisateur vers une page de votre choix après la déconnexion
header('Location: index.php');
exit;
?>

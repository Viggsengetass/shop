<?php
function connectToDB(): PDO
{
    try {
        $host = "localhost";
        $dbname = "macromania";
        $username = "root";
        $pass = "";
        // Connexion à la base de données MySQL
        $pdo = new PDO(
            "mysql:host=$host;port=3306;dbname=$dbname",
            $username,
            $pass
        );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;

    } catch (PDOException $e) {
        // En cas d'erreur de connexion ou d'exécution de requête
        echo "Erreur : " . $e->getMessage();
    }
}


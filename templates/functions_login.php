<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
function loginUser($username, $password)
{
    $pdo = connectToDB();

    try {
        // Fetch the user data by username
        $query = "SELECT * FROM user WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify the password
            $hashedPasswordFromDB = $user['password'];
            if (password_verify($password, $hashedPasswordFromDB)) {
                // Password is correct, return user data
                return $user;
            } else {
                // Password is incorrect
                return "Mot de passe incorrect.";
            }
        } else {
            // User not found
            return "Utilisateur introuvable.";
        }
    } catch (PDOException $e) {
        // Error occurred
        return "Erreur : " . $e->getMessage();
    }
}
?>

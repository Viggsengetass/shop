<?php
// Inclure le fichier de configuration
include_once('../includes/config.php');
include_once('../includes/header.php');

$pdo = connectToDB();
$query = "SELECT * FROM product";
$stmt = $pdo->query($query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macromania - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="images/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text">Prix : <?php echo $row['price']; ?> €</p>
                        <a href="product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Détails</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

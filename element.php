<?php
require_once 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM animaux WHERE id = ?");
    $stmt->execute([$id]);
    $animal = $stmt->fetch();
}

if (!$animal) {
    die("Animal non trouvé !");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $animal['nom']; ?></title>
</head>
<body>
    <h1><?php echo $animal['nom']; ?></h1>
    <p><strong>Espèce :</strong> <?php echo $animal['espece']; ?></p>
    <p><strong>Habitat :</strong> <?php echo $animal['habitat']; ?></p>
    <a href="index.php">Retour à la recherche</a>
</body>
</html>
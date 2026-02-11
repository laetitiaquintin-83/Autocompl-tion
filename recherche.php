<?php
require_once 'db.php';

// On récupère la recherche
$search = $_GET['search'] ?? '';

if (!empty($search)) {
    // On cherche les animaux qui contiennent la recherche dans leur nom
    $stmt = $pdo->prepare("SELECT * FROM animaux WHERE nom LIKE :s");
    $stmt->execute(['s' => '%' . $search . '%']);
    $resultats = $stmt->fetchAll();
} else {
    $resultats = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats pour "<?php echo htmlspecialchars($search); ?>"</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php">Accueil</a>
    </header>

    <main>
        <h1>Résultats de recherche pour : "<?php echo htmlspecialchars($search); ?>"</h1>

        <?php if (count($resultats) > 0): ?>
            <ul class="results-list">
                <?php foreach ($resultats as $animal): ?>
                    <li>
                        <a href="element.php?id=<?php echo $animal['id']; ?>">
                            <?php echo $animal['nom']; ?>
                        </a> 
                        (<?php echo $animal['espece']; ?>)
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Désolé, aucun animal ne correspond à votre recherche.</p>
        <?php endif; ?>
    </main>
</body>
</html>
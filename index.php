<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Moteur de recherche Animaux</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="search-container">
            <form action="recherche.php" method="GET">
                <input type="text" id="search-bar" name="search" placeholder="Rechercher un animal..." autocomplete="off">
                <div id="suggestions"></div>
            </form>
        </div>
    </header>

    <main>
        <h1>Bienvenue sur Animaux.com</h1>
        <p>Tapez le nom d'un animal dans la barre en haut !</p>
    </main>

    <script src="script.js"></script>
</body>
</html>
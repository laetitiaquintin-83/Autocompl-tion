const searchBar = document.getElementById('search-bar');
const suggestionsBox = document.getElementById('suggestions');

searchBar.addEventListener('input', function () {
    let input = searchBar.value;

    if (input.length > 0) {
        console.log("L'utilisateur recherche : " + input); // Ce que tu vois déjà

        // On appelle le serveur
        fetch('search.php?s=' + input)
            .then(response => response.json())
            .then(data => {
                suggestionsBox.innerHTML = ''; // On vide pour la nouvelle recherche

                // On affiche ceux qui commencent par la lettre
                data.commence.forEach(item => {
                    suggestionsBox.innerHTML += `<div class="suggestion-item"><a href="element.php?id=${item.id}">${item.nom}</a></div>`;
                });

                // Petite barre de séparation
                if (data.commence.length > 0 && data.contient.length > 0) {
                    suggestionsBox.innerHTML += `<div class="separator"></div>`;
                }

                // On affiche ceux qui contiennent la lettre
                data.contient.forEach(item => {
                    suggestionsBox.innerHTML += `<div class="suggestion-item"><a href="element.php?id=${item.id}">${item.nom}</a></div>`;
                });
            })
            .catch(error => console.error("Erreur Fetch :", error)); // Si ça plante, on veut savoir pourquoi !
    } else {
        suggestionsBox.innerHTML = '';
    }
});
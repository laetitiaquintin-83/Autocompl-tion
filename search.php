<?php
require_once 'db.php';

// On prépare un tableau vide par défaut
$response = ['commence' => [], 'contient' => []];

if (isset($_GET['s']) && !empty($_GET['s'])) {
    $search = $_GET['s'];
    $recherche = $search . '%';
    $contient = '%' . $search . '%';

    try {
        // 1. Commence par...
        $query1 = $pdo->prepare("SELECT id, nom FROM animaux WHERE nom LIKE :s LIMIT 5");
        $query1->execute(['s' => $recherche]);
        $response['commence'] = $query1->fetchAll(PDO::FETCH_ASSOC);

        // 2. Contient... (mais ne commence pas par)
        $query2 = $pdo->prepare("SELECT id, nom FROM animaux WHERE nom LIKE :c AND nom NOT LIKE :s LIMIT 5");
        $query2->execute(['c' => $contient, 's' => $recherche]);
        $response['contient'] = $query2->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        // En cas d'erreur, on ne renvoie rien pour ne pas faire planter le JS
    }
}

// LA SEULE CHOSE QUE LE FICHIER DOIT AFFICHER :
header('Content-Type: application/json');
echo json_encode($response);
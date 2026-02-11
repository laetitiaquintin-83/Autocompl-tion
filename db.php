<?php
$host = 'localhost';
$dbname = 'autocompletion';
$user = 'root';
$pass = ''; // Sur Laragon, le mot de passe est vide par défaut

try {
    // On crée la connexion
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // On demande à PHP d'afficher les erreurs s'il y en a
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
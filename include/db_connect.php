<?php
// Définition des variables pour les informations sensibles
$DB_HOST = '127.0.0.1';
$DB_PORT = '3306'; // Port mis à jour
$DB_USER = 'root';
$DB_PASSWORD = '0980'; // faut changer le mot de passe ici 
$DB_NAME = 'zoo_arcadia';

try {
    // Connexion à la base de données avec le port et le charset correctement configurés
    $dsn = "mysql:host=" . $DB_HOST . ";port=" . $DB_PORT . ";dbname=" . $DB_NAME . ";charset=utf8mb4";
    $pdo = new PDO($dsn, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Utilisation de l'enregistrement des erreurs plutôt que l'affichage direct des messages
    error_log("Erreur de connexion à la base de données : " . $e->getMessage(), 0);
    die("Erreur : Connexion à la base de données échouée. Veuillez réessayer plus tard.");
}
?>
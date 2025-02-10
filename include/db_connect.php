<?php
// Définition des variables pour la connexion à la base de données
$DB_HOST = '127.0.0.1'; 
$DB_PORT = '3306'; 
$DB_USER = 'root'; 
$DB_PASSWORD = '0980'; // Mets ton mot de passe ici
$DB_NAME = 'zoo_arcadia'; 

try {
    // Connexion avec PDO
    $dsn = "mysql:host=" . $DB_HOST . ";port=" . $DB_PORT . ";dbname=" . $DB_NAME . ";charset=utf8mb4";
    $pdo = new PDO($dsn, $DB_USER, $DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    error_log("Erreur de connexion : " . $e->getMessage(), 0);
    die("Erreur : Connexion à la base de données impossible.");
}
?>

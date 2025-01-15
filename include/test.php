<?php
try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=zoo_arcadia;charset=utf8mb4", 'root', '1234');
    echo "Connexion réussie";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
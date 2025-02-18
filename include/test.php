<?php
try {
    $pdo = new PDO("mysql:host=localhost;port=33060;dbname=zoo_arcadia;charset=utf8mb4", 'user1', '9080');
    echo "Connexion réussie";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
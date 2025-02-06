<?php
include "../include/db_connect.php";
// Connexion à la base de données (remplacez les valeurs par vos propres paramètres)

// Générer les mots de passe hachés avec bcrypt (avec des mots de passe différents)
$adminPassword = password_hash('SecureAdmin123!', PASSWORD_BCRYPT);
$employeePassword = password_hash('EmployeePass456$', PASSWORD_BCRYPT);
$vetPassword = password_hash('VetPass789#', PASSWORD_BCRYPT);

// Requête SQL d'insertion
$sql = "INSERT INTO users (email, password, role) VALUES 
        (:email1, :password1, 'admin'), 
        (:email2, :password2, 'employee'), 
        (:email3, :password3, 'vet')";

// Préparation et exécution de la requête
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'email1' => 'admin@example.com',
    'password1' => $adminPassword,
    'email2' => 'employee@example.com',
    'password2' => $employeePassword,
    'email3' => 'vet@example.com',
    'password3' => $vetPassword
]);

echo "Utilisateurs insérés avec succès !";
?>

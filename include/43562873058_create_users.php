<?php
include "../include/db_connect.php"; // Connexion à la base de données

// Générer les mots de passe hachés avec bcrypt
$adminPassword = password_hash('SecureAdmin123!', PASSWORD_BCRYPT);
$employeePassword1 = password_hash('EmployeePass123$', PASSWORD_BCRYPT);
$employeePassword2 = password_hash('EmployeePass456$', PASSWORD_BCRYPT);
$vetPassword1 = password_hash('VetPass789#', PASSWORD_BCRYPT);
$vetPassword2 = password_hash('VetPass987#', PASSWORD_BCRYPT);

// Requête SQL d'insertion
$sql = "INSERT INTO users (name, email, password, role) VALUES 
        ('Admin User', 'admin@zoo.com', :password1, 'admin'), 
        ('Employee One', 'employee1@zoo.com', :password2, 'employee'), 
        ('Employee Two', 'employee2@zoo.com', :password3, 'employee'), 
        ('Vet One', 'vet1@zoo.com', :password4, 'vet'), 
        ('Vet Two', 'vet2@zoo.com', :password5, 'vet')";

// Préparation et exécution de la requête
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'password1' => $adminPassword,
    'password2' => $employeePassword1,
    'password3' => $employeePassword2,
    'password4' => $vetPassword1,
    'password5' => $vetPassword2
]);

echo "Utilisateurs insérés avec succès !";
?>

<?php
session_start();
include '../includes/db_connect.php';

// Vérifier si l'utilisateur est bien administrateur
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../connexion.php");
    exit();
}

// Récupération des utilisateurs
$stmt = $pdo->query("SELECT id, email, role FROM users");
$users = $stmt->fetchAll();

// Récupération des services
$stmt = $pdo->query("SELECT id, nom, description FROM services");
$services = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Admin - Zoo Arcadia</title>
    <link rel="stylesheet" href="/css/admin-dashboard.css">
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="container">
        <h2 class="text-center">Tableau de bord Administrateur</h2>
        <h3>Gestion des utilisateurs</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                    <td>
                        <a href="edit-user.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Modifier</a>
                        <a href="delete-user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Gestion des services</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                <tr>
                    <td><?php echo htmlspecialchars($service['id']); ?></td>
                    <td><?php echo htmlspecialchars($service['nom']); ?></td>
                    <td><?php echo htmlspecialchars($service['description']); ?></td>
                    <td>
                        <a href="edit-service.php?id=<?php echo $service['id']; ?>" class="btn btn-warning">Modifier</a>
                        <a href="delete-service.php?id=<?php echo $service['id']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>

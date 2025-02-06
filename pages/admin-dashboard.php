<?php
// Secure session cookies
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => 'localhost',  // Change if needed
    'secure' => false,  // no httpss
    'httponly' => true,  // Prevent Js
    'samesite' => 'Strict'  // Prevent CSRF attacks
]);

// Security Headers
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Content-Security-Policy: default-src 'self'; script-src 'self' https://kit.fontawesome.com https://cdn.jsdelivr.net; style-src 'self' https://fonts.googleapis.com https://cdn.jsdelivr.net; font-src 'self' https://fonts.gstatic.com;");

// Start session
session_start();
require_once '../include/db_connect.php';

// Check if user is logged in and is an admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Fetch dashboard data
try {
    // Total Users
    $stmtUsers = $pdo->query("SELECT COUNT(*) as total FROM users");
    $totalUsers = $stmtUsers->fetch(PDO::FETCH_ASSOC)['total'];

    // Total Reservations
    $stmtReservations = $pdo->query("SELECT COUNT(*) as total FROM reservations");
    $totalReservations = $stmtReservations->fetch(PDO::FETCH_ASSOC)['total'];

    // Latest Notifications
    $stmtNotifications = $pdo->query("SELECT message FROM notifications ORDER BY created_at DESC LIMIT 4");
    $notifications = $stmtNotifications->fetchAll(PDO::FETCH_ASSOC);

    // Latest Activity History
    $stmtHistory = $pdo->query("SELECT date, action, user, status FROM activity_log ORDER BY date DESC LIMIT 5");
    $history = $stmtHistory->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage(), 3, "/var/log/zooarcadia_errors.log");
    die("Une erreur est survenue, veuillez contacter l'administrateur.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Tableau de Bord Administrateur</title>
    <meta name="description" content="Gérez les utilisateurs, réservations et rapports depuis le tableau de bord administrateur du Zoo Arcadia.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin-dashboard.css">
</head>
<body>

    <!-- Navigation -->
    <?php include '../include/navbar.php'; ?>

    <!-- Admin Dashboard -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Tableau de Bord Administrateur</h2>
            <p class="text-center">Gérez les utilisateurs, les réservations et les rapports depuis votre espace sécurisé.</p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Gestion des Utilisateurs</h5>
                            <p class="card-text">Total : <strong><?= htmlspecialchars($totalUsers) ?></strong> utilisateurs.</p>
                            <a href="manage-users.php" class="btn btn-primary">Gérer les utilisateurs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Réservations</h5>
                            <p class="card-text">Total : <strong><?= htmlspecialchars($totalReservations) ?></strong> réservations.</p>
                            <a href="manage-reservations.php" class="btn btn-primary">Voir les réservations</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Rapports et Statistiques</h5>
                            <p class="card-text">Analysez les données clés du zoo.</p>
                            <a href="reports.php" class="btn btn-primary">Voir les rapports</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notifications -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Notifications et Alertes</h2>
            <ul class="list-group">
                <?php if (!empty($notifications)): ?>
                    <?php foreach ($notifications as $notification): ?>
                        <li class="list-group-item"><?= htmlspecialchars($notification['message']) ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="list-group-item">Aucune notification récente.</li>
                <?php endif; ?>
            </ul>
        </div>
    </section>

    <!-- Activity Log -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Historique des Activités</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Activité</th>
                        <th>Utilisateur</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($history)): ?>
                        <?php foreach ($history as $event): ?>
                            <tr>
                                <td><?= htmlspecialchars($event['date']) ?></td>
                                <td><?= htmlspecialchars($event['action']) ?></td>
                                <td><?= htmlspecialchars($event['user']) ?></td>
                                <td><?= htmlspecialchars($event['status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Aucune activité récente.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../include/footer.php'; ?>

</body>
</html>

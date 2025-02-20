<?php
// Start session securely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => 'localhost',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
}

// Security Headers
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Content-Security-Policy: default-src 'self'; script-src 'self' https://kit.fontawesome.com https://cdn.jsdelivr.net; style-src 'self' https://fonts.googleapis.com https://cdn.jsdelivr.net; font-src 'self' https://fonts.gstatic.com;");

require_once '../include/db_connect.php';

// Check if user is an admin
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
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

    // Fetch pending reviews
    $stmtReviews = $pdo->query("SELECT * FROM review WHERE is_approved = FALSE ORDER BY created_at DESC");
    $pendingReviews = $stmtReviews->fetchAll(PDO::FETCH_ASSOC);

    // Fetch all users
    $stmtAllUsers = $pdo->query("SELECT * FROM users");
    $users = $stmtAllUsers->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    die("Une erreur est survenue, veuillez contacter l'administrateur.");
}

// Handle Review Actions
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['review_action'], $_POST['review_id'], $_POST['csrf_token'])) {
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token invalide.");
    }

    $reviewId = intval($_POST['review_id']);
    $action = $_POST['review_action'];

    if ($action === "approve") {
        $stmt = $pdo->prepare("UPDATE review SET is_approved = TRUE WHERE id = ?");
        $stmt->execute([$reviewId]);
    } elseif ($action === "delete") {
        $stmt = $pdo->prepare("DELETE FROM review WHERE id = ?");
        $stmt->execute([$reviewId]);
    }

    header("Location: admin-dashboard.php");
    exit();
}

// Handle User Actions (Modify, Delete, Add Veterinary Role)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['user_action'], $_POST['user_id'], $_POST['csrf_token'])) {
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token invalide.");
    }

    $userId = intval($_POST['user_id']);
    $action = $_POST['user_action'];

    if ($action === "delete") {
        // Delete user
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$userId]);
    } elseif ($action === "promote_vet") {
        // Promote user to veterinary role
        $stmt = $pdo->prepare("UPDATE users SET role = 'veterinary' WHERE id = ?");
        $stmt->execute([$userId]);
    } elseif ($action === "update_role") {
        $newRole = $_POST['new_role']; // Ensure to sanitize input
        // Update user role
        $stmt = $pdo->prepare("UPDATE users SET role = ? WHERE id = ?");
        $stmt->execute([$newRole, $userId]);
    }

    header("Location: admin-dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Tableau de Bord Administrateur</title>
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
            <p class="text-center">Gérez les utilisateurs, les réservations et les avis visiteurs.</p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Utilisateurs</h5>
                            <p class="card-text">Total : <strong><?= htmlspecialchars($totalUsers) ?></strong></p>
                            <a href="#gestion-utilisateurs" class="btn btn-primary">Gérer</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Réservations</h5>
                            <p class="card-text">Total : <strong><?= htmlspecialchars($totalReservations) ?></strong></p>
                            <a href="manage-reservations.php" class="btn btn-primary">Voir</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Rapports</h5>
                            <p class="card-text">Analysez les données.</p>
                            <a href="reports.php" class="btn btn-primary">Voir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- User Management Section -->
    <section id="gestion-utilisateurs" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Gestion des Utilisateurs</h2>
            <p class="text-center">Gérer les utilisateurs, modifier leurs rôles, ou supprimer des comptes.</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['role']) ?></td>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                    <button type="submit" name="user_action" value="delete" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                    <select name="new_role" class="form-select form-select-sm" required>
                                        <option value="user">Utilisateur</option>
                                        <option value="admin">Administrateur</option>
                                        <option value="veterinary">Vétérinaire</option>
                                    </select>
                                    <button type="submit" name="user_action" value="update_role" class="btn btn-warning btn-sm">Mettre à jour</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Review Management Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Validation des Avis</h2>
            <p class="text-center">Approuvez ou supprimez les avis des visiteurs.</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Avis</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pendingReviews)): ?>
                        <?php foreach ($pendingReviews as $review): ?>
                            <tr>
                                <td><?= htmlspecialchars($review['pseudo']) ?></td>
                                <td><?= htmlspecialchars($review['avis']) ?></td>
                                <td><?= htmlspecialchars($review['created_at']) ?></td>
                                <td>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                        <input type="hidden" name="review_id" value="<?= $review['id'] ?>">
                                        <button type="submit" name="review_action" value="approve" class="btn btn-success btn-sm">✔ Approuver</button>
                                    </form>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                        <input type="hidden" name="review_id" value="<?= $review['id'] ?>">
                                        <button type="submit" name="review_action" value="delete" class="btn btn-danger btn-sm">✖ Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Aucun avis en attente de validation.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../include/footer.php'; ?>

    <!-- Smooth Scroll Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

</body>
</html>

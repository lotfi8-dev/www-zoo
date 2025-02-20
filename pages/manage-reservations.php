<?php
// Start session and ensure admin authentication
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

// Generate CSRF token if it doesn't exist
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Include database connection
require_once '../include/db_connect.php';

$message = "";
$messageType = "";

// Handle reservation deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $message = "Erreur CSRF détectée !";
        $messageType = "danger";
    } else {
        $delete_id = intval($_POST['delete_id']);
        try {
            $stmt = $pdo->prepare("DELETE FROM reservations WHERE id = ?");
            $stmt->execute([$delete_id]);
            $message = "Réservation supprimée avec succès.";
            $messageType = "success";
        } catch (PDOException $e) {
            error_log("Erreur de suppression: " . $e->getMessage());
            $message = "Erreur lors de la suppression.";
            $messageType = "danger";
        }
    }

    // Regenerate CSRF token
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Fetch reservations
try {
    $stmt = $pdo->query("SELECT * FROM reservations ORDER BY date_reservation ASC");
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Erreur de récupération: " . $e->getMessage());
    $message = "Erreur de récupération des réservations.";
    $messageType = "danger";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Réservations - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
</head>
<body>

    <?php include '../include/navbar.php'; ?>

    <div class="container py-5">
        <h2 class="text-center text-primary mb-4">Gestion des Réservations</h2>

        <!-- Bootstrap alert (Dismissible Popup) -->
        <?php if (!empty($message)): ?>
            <div class="alert alert-<?= htmlspecialchars($messageType) ?> alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($message) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Nombre</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($reservations)): ?>
                    <?php foreach ($reservations as $res): ?>
                        <tr>
                            <td><?= htmlspecialchars($res['id']) ?></td>
                            <td><?= htmlspecialchars($res['nom']) ?></td>
                            <td><?= htmlspecialchars($res['email']) ?></td>
                            <td><?= htmlspecialchars($res['date_reservation']) ?></td>
                            <td><?= htmlspecialchars($res['nb_personnes']) ?></td>
                            <td><?= htmlspecialchars($res['message']) ?></td>
                            <td>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                                    <input type="hidden" name="delete_id" value="<?= $res['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?');">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Aucune réservation trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php include '../include/footer.php'; ?>

    <!-- Bootstrap JavaScript for dismissible alerts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

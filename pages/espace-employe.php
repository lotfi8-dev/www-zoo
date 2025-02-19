<?php
// Secure session start
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Secure session cookies only if the session hasn't started yet
if (!headers_sent()) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => 'localhost',  // Change if needed
        'secure' => false,  // Change to true if using HTTPS
        'httponly' => true,  // Prevent JavaScript access
        'samesite' => 'Strict'  // Mitigate CSRF attacks
    ]);
}

// Include database connection
require_once '../include/db_connect.php';

// Check if user is logged in and is an employee
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
    error_log("Unauthorized access attempt: " . print_r($_SESSION, true));
    header("Location: ../index.php");
    exit();
}

// CSRF Token Handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("Invalid CSRF token");
    }
}

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle review validation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review_action'])) {
    $review_id = filter_input(INPUT_POST, 'review_id', FILTER_VALIDATE_INT);
    $action = ($_POST['review_action'] === 'validate') ? 'valid' : 'invalid';

    if ($review_id) {
        try {
            $stmt = $pdo->prepare("UPDATE reviews SET status = :status WHERE id = :id");
            $stmt->execute(['status' => $action, 'id' => $review_id]);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            die("An error occurred. Please try again later.");
        }
    }
}

// Handle food management
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_food'])) {
    $animal = htmlspecialchars(trim($_POST['animal']));
    $food_type = htmlspecialchars(trim($_POST['food_type']));
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_FLOAT);

    if ($animal && $food_type && $quantity !== false && $quantity > 0) {
        try {
            $stmt = $pdo->prepare("INSERT INTO food_records (animal, food_type, quantity) VALUES (:animal, :food_type, :quantity)");
            $stmt->execute(['animal' => $animal, 'food_type' => $food_type, 'quantity' => $quantity]);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            die("An error occurred. Please try again later.");
        }
    }
}

// Fetch pending reviews
try {
    $stmtReviews = $pdo->query("SELECT id, author, comment, created_at FROM reviews WHERE status = 'pending'");
    $reviews = $stmtReviews->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    die("An error occurred. Please try again later.");
}

// Fetch food records
try {
    $stmtFood = $pdo->query("SELECT * FROM food_records ORDER BY created_at DESC");
    $foodRecords = $stmtFood->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    die("An error occurred. Please try again later.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Employé - Zoo Arcadia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/espace-employe.css">
</head>
<body>
    <!-- Barre de navigation -->
    <?php include '../include/navbar.php'; ?>
    
    <!-- Header -->
    <header class="bg-primary text-white text-center py-3">
        <h1>Espace Employé</h1>
        <p>Gérez les avis des visiteurs et les informations sur la nourriture des animaux</p>
    </header>

    <!-- Section Gestion des Avis -->
    <main class="container py-5">
        <section class="mb-5">
            <h2 class="text-secondary">Gestion des Avis des Visiteurs</h2>
            <p>Validez ou invalidez les avis soumis par les visiteurs pour garantir leur pertinence.</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Auteur</th>
                        <th>Commentaire</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews as $review): ?>
                        <tr>
                            <td><?= htmlspecialchars($review['author']) ?></td>
                            <td><?= htmlspecialchars($review['comment']) ?></td>
                            <td><?= htmlspecialchars($review['created_at']) ?></td>
                            <td>
                                <form method="POST" class="d-inline">
                                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                    <input type="hidden" name="review_id" value="<?= $review['id'] ?>">
                                    <button type="submit" name="review_action" value="validate" class="btn btn-success">Valider</button>
                                    <button type="submit" name="review_action" value="invalidate" class="btn btn-danger">Invalider</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Section Gestion de la Nourriture -->
        <section>
            <h2 class="text-secondary">Gestion de la Nourriture</h2>
            <p>Ajoutez des informations sur la nourriture donnée aux animaux.</p>
            <form method="POST" class="mb-3">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="mb-3">
                    <label for="animal" class="form-label">Animal</label>
                    <select name="animal" id="animal" class="form-select">
                        <option value="lion">Lion</option>
                        <option value="girafe">Girafe</option>
                        <option value="elephant">Éléphant</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="food_type" class="form-label">Type de Nourriture</label>
                    <input type="text" name="food_type" id="food_type" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantité (en kg)</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" step="0.1" required>
                </div>
                <button type="submit" name="add_food" class="btn btn-primary">Ajouter</button>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <?php include '../include/footer.php'; ?>
</body>
</html>

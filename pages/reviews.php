<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => 'localhost',  // Adjust if using a real domain
        'secure' => false,  // Set to true for HTTPS
        'httponly' => true,  // Prevent JavaScript access
        'samesite' => 'Strict'  // Mitigate CSRF
    ]);
}

// Security Headers
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Content-Security-Policy: default-src 'self'; script-src 'self' https://kit.fontawesome.com https://cdn.jsdelivr.net; style-src 'self' https://fonts.googleapis.com https://cdn.jsdelivr.net; font-src 'self' https://fonts.gstatic.com;");

include '../include/db_connect.php';

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur CSRF détectée !");
    }

    $pseudo = htmlspecialchars(trim($_POST['pseudo']), ENT_QUOTES, 'UTF-8');
    $avis = htmlspecialchars(trim($_POST['avis']), ENT_QUOTES, 'UTF-8');

    if (!empty($pseudo) && !empty($avis)) {
        $stmt = $pdo->prepare("INSERT INTO review (pseudo, avis, is_approved) VALUES (?, ?, FALSE)");
        $stmt->execute([$pseudo, $avis]);
        $message = "Votre avis a été soumis et est en attente de validation.";
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}

// Fetch approved reviews
$stmt = $pdo->query("SELECT pseudo, avis, created_at FROM review WHERE is_approved = TRUE ORDER BY created_at DESC LIMIT 5");
$approved_reviews = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Avis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../include/navbar.php'; ?>

    <div class="container my-5">
        <h2 class="text-center text-primary">Avis des Visiteurs</h2>

        <div class="card shadow-sm p-4 mt-4">
            <h4 class="card-title">Laissez un avis</h4>
            <form action="" method="POST">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Votre nom</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                </div>
                <div class="mb-3">
                    <label for="avis" class="form-label">Votre avis</label>
                    <textarea class="form-control" id="avis" name="avis" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            <?php if (!empty($message)) : ?>
                <p class="alert alert-info mt-3"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
        </div>

        <div class="mt-5">
            <h3 class="text-center">Les Avis Validés</h3>
            <div class="row">
                <?php foreach ($approved_reviews as $review): ?>
                <div class="col-md-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($review['pseudo']); ?></h5>
                            <h6 class="card-subtitle text-muted">Posté le <?= date('d/m/Y', strtotime($review['created_at'])); ?></h6>
                            <p class="card-text">"<?= htmlspecialchars($review['avis']); ?>"</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include '../include/footer.php'; ?>
</body>
</html>

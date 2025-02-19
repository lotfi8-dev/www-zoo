<?php
// Start session at the very beginning
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate CSRF token if it doesn't exist
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Secure session cookies
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => 'localhost',  // Adjust for production
    'secure' => false,  // Change to true if using HTTPS
    'httponly' => true,
    'samesite' => 'Strict'
]);

// Security headers
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Content-Security-Policy: default-src 'self'; script-src 'self' https://kit.fontawesome.com https://cdn.jsdelivr.net; style-src 'self' https://fonts.googleapis.com https://cdn.jsdelivr.net; font-src 'self' https://fonts.gstatic.com;");

$message = "";

// Rate limiting: prevent multiple submissions within 30 seconds
if (isset($_SESSION['last_submission_time'])) {
    if (time() - $_SESSION['last_submission_time'] < 30) {
        die("Veuillez attendre avant de soumettre à nouveau.");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF Check
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur CSRF détectée !");
    }

    // Validate input
    $nom = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    if (!preg_match("/^[a-zA-Z ]*$/", $nom)) {
        die("Nom invalide.");
    }

    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    if (!$email) {
        die("Email invalide.");
    }

    $date = trim($_POST['date']);
    $nb_personnes = (int) $_POST['nb_personnes'];
    $message_user = htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8');

    // Validate date format
    $dateObj = DateTime::createFromFormat('Y-m-d', $date);
    if (!$dateObj || $dateObj->format('Y-m-d') !== $date) {
        die("Date invalide !");
    }

    // Check database availability
    if ($nom && $email && $date && $nb_personnes > 0 && $nb_personnes <= 20) {
        try {
            require '../include/db_connect.php'; // Ensure database connection is included

            $stmt = $pdo->prepare("SELECT COUNT(*) FROM reservations WHERE date_reservation = ?");
            $stmt->execute([$date]);
            $disponibilite = (int) $stmt->fetchColumn();

            if ($disponibilite < 50) {  // Limit = 50
                $stmt = $pdo->prepare("INSERT INTO reservations (nom, email, date_reservation, nb_personnes, message) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$nom, $email, $date, $nb_personnes, $message_user]);

                // Store submission timestamp to prevent spam
                $_SESSION['last_submission_time'] = time();

                $message = "Votre réservation a bien été enregistrée.";

                // 🔄 Regenerate CSRF token after successful submission
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            } else {
                $message = "Désolé, cette date est complète.";
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            die("Une erreur est survenue, veuillez réessayer plus tard.");
        }
    } else {
        $message = "Veuillez remplir tous les champs correctement.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Réservation</title>
    <meta name="description" content="Réservez votre visite au Zoo Arcadia.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/Activités.css">
</head>
<body>
    <?php include '../include/navbar.php'; ?>

    <header class="hero-section text-white text-center">
        <div class="container d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-4">Réservez votre visite au Zoo Arcadia</h1>
            <p class="lead">Planifiez une journée mémorable en explorant nos habitats.</p>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-4"><br>Réservations</h2>
            <form action="" method="POST" class="bg-light p-4 rounded shadow">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date de visite</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="nb_personnes" class="form-label">Nombre de personnes</label>
                    <input type="number" class="form-control" id="nb_personnes" name="nb_personnes" min="1" max="20" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message ou demandes particulières</label>
                    <textarea class="form-control" id="message" name="message" rows="4" style="resize: none;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4">Envoyer ma réservation</button>
            </form>
            <?php if (!empty($message)) : ?>
                <p class="alert alert-info mb-3"> <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?> </p>
            <?php endif; ?>
        </div>
    </section>

    <?php include '../include/footer.php'; ?>
</body>
</html>

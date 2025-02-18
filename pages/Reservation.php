<?php
// secure cookies
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => 'localhost',  // Make sure to set this to your actual domain if needed
    'secure' => false,  // Set this to false as you're not using HTTPS
    'httponly' => true,  // Prevent JS access to cookies
    'samesite' => 'Strict'  // Protect from cross-site request attacks
]);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Regen session
session_regenerate_id(true);

// Protection against XSS and Clickjacking
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Content-Security-Policy: default-src 'self'; script-src 'self' https://kit.fontawesome.com https://cdn.jsdelivr.net; style-src 'self' https://fonts.googleapis.com https://cdn.jsdelivr.net; font-src 'self' https://fonts.gstatic.com;");

// CSRF token generation & verification
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$message = "";

// Rate limiting - store the timestamp of the last form submission
if (isset($_SESSION['last_submission_time'])) {
    $time_diff = time() - $_SESSION['last_submission_time'];
    if ($time_diff < 30) {  // Prevent multiple submissions within 30 seconds
        die("Please wait before submitting again.");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    $dateObj = DateTime::createFromFormat('Y-m-d', $date);
    if (!$dateObj || $dateObj->format('Y-m-d') !== $date) {
        die("Date invalide !");
    }

    if ($nom && $email && $date && $nb_personnes > 0 && $nb_personnes <= 20) {
        try {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM reservations WHERE date_reservation = ?");
            $stmt->execute([$date]);
            $disponibilite = (int) $stmt->fetchColumn();

            if ($disponibilite < 50) {  // Limit = 50 
                $stmt = $pdo->prepare("INSERT INTO reservations (nom, email, date_reservation, nb_personnes, message) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$nom, $email, $date, $nb_personnes, $message_user]);

                // timestamp
                $_SESSION['last_submission_time'] = time();

                $message = "Votre réservation a bien été enregistrée.";
                // regen CSRF token 
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            } else {
                $message = "Désolé, cette date est complète.";
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            die("An error occurred, please try again later.");
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

    <!-- Hero Section -->
    <header class="hero-section text-white text-center">
        <div class="container d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-4">Réservez votre visite au Zoo Arcadia</h1>
            <p class="lead">Planifiez une journée mémorable en explorant nos habitats.</p>
        </div>
    </header>

    <!-- Section Réservation -->
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

    <!-- Informations utiles -->
    <section class="info-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Informations Utiles</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <i class="fas fa-clock fa-3x text-success mb-3"></i>
                    <p><strong>Horaires :</strong> Ouvert tous les jours de 9h à 18h</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-ticket-alt fa-3x text-warning mb-3"></i>
                    <p><strong>Tarifs :</strong> Adulte 15€, Enfant 10€, Gratuit pour les moins de 3 ans</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-map-marker-alt fa-3x text-danger mb-3"></i>
                    <p><strong>Adresse :</strong> 123 Rue des Animaux, 75000 Paris</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <?php include '../include/footer.php'; ?>
</body>
</html>

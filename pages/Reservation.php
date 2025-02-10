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

session_start();

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
    <title>Réservation - Zoo Arcadia</title>
    <link rel="stylesheet" href="../css/Reservation.css">
</head>
<body>
    <?php include '../include/navbar.php'; ?>
    <div class="container">
        <h2 class="text-center">Réservez une activité</h2>
        <?php if (isset($message)) echo "<p class='text-info'>$message</p>"; ?>
        <form method="post">
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Date de réservation</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Activité</label>
                <select name="activite" class="form-control" required>
                    <option value="Visite guidée">Visite guidée</option>
                    <option value="Soigneur d'un jour">Soigneur d'un jour</option>
                    <option value="Safari nocturne">Safari nocturne</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Réserver</button>
        </form>
    </div>
    <?php include '../include/footer.php'; ?>
</body>
</html>

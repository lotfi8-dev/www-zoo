<?php
session_start();
include '../includes/db_connect.php';

// Vérifier si une réservation est soumise
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $date = $_POST['date'];
    $activite = $_POST['activite'];
    
    // Vérification que tous les champs sont remplis
    if (!empty($nom) && !empty($email) && !empty($date) && !empty($activite)) {
        // Vérifier la disponibilité
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM reservations WHERE date_reservation = ? AND activite = ?");
        $stmt->execute([$date, $activite]);
        $disponibilite = $stmt->fetchColumn();
        
        if ($disponibilite < 10) { // Limite de 10 réservations par activité et par jour
            // Insérer la réservation
            $stmt = $pdo->prepare("INSERT INTO reservations (nom, email, date_reservation, activite) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nom, $email, $date, $activite]);
            $message = "Votre réservation a bien été enregistrée.";
        } else {
            $message = "Désolé, cette activité est complète pour cette date.";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
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
    <?php include '../includes/navbar.php'; ?>
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
    <?php include '../includes/footer.php'; ?>
</body>
</html>

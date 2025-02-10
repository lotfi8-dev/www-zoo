<?php
include_once(__DIR__ . '/../include/db_connect.php');

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $email = $_POST['email'];

    try {
        $stmt = $pdo->prepare("INSERT INTO contacts (titre, description, email, date_envoi) 
                               VALUES (:titre, :description, :email, NOW())");
        $stmt->execute([
            'titre' => $titre,
            'description' => $description,
            'email' => $email
        ]);
        $message = "Votre message a été envoyé avec succès.";
    } catch (PDOException $e) {
        $message = "Erreur SQL : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Zoo Arcadia</title>
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body>
    <?php include '../include/navbar.php'; ?>
    <div class="container">
        <h2 class="text-center">Contactez-nous</h2>
        <?php if (isset($confirmation)) echo "<p class='text-info'>$confirmation</p>"; ?>
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
                <label>Message</label>
                <textarea name="message" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
    <?php include '../include/footer.php'; ?>
</body>
</html>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    
    if (!empty($nom) && !empty($email) && !empty($message)) {
        $to = "contact@zooarcadia.com";
        $subject = "Message de $nom via le formulaire de contact";
        $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";
        
        if (mail($to, $subject, $message, $headers)) {
            $confirmation = "Votre message a bien été envoyé.";
        } else {
            $confirmation = "Erreur lors de l'envoi du message. Veuillez réessayer plus tard.";
        }
    } else {
        $confirmation = "Veuillez remplir tous les champs.";
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
    <?php include '../includes/navbar.php'; ?>
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
    <?php include '../includes/footer.php'; ?>
</body>
</html>

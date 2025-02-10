<?php
include_once(__DIR__ . '/../include/db_connect.php');

session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->execute(["email" => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_role"] = $user["role"];
            header("Location: admin-dashboard.php");
            exit();
        } else {
            $message = "Identifiants incorrects.";
        }
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
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/connexion.css"> 
</head>
<body>
    <?php include_once(__DIR__ . '/../include/navbar.php'); ?>

    <h1>Connexion</h1>
    <?php if (!empty($message)) : ?>
        <p class="error"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="connexion.php" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>

    <?php include_once __DIR__ . '/../include/footer.php'; ?>
</body>
</html>

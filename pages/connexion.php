<?php
session_start();
include '../includes/db_connect.php';

// Générer un token CSRF si inexistant
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Connexion sécurisée avec gestion des rôles
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur CSRF, veuillez réessayer.");
    }
    
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $pdo->prepare("SELECT id, email, password, role FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        
        switch ($user['role']) {
            case 'admin':
                header("Location: ../pages/admin-dashboard.php");
                break;
            case 'employe':
                header("Location: ../pages/espace-employe.php");
                break;
            case 'veterinaire':
                header("Location: ../pages/espace-veterinaire.php");
                break;
        }
        exit();
    } else {
        $error = "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Zoo Arcadia</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="container">
        <h2 class="text-center">Connexion</h2>
        <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
        <form method="post">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Mot de passe</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>

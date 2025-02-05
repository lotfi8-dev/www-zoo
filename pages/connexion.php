<?php
session_start();
include '../include/db_connect.php';

// Générer un token CSRF si inexistant
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Connexion sécurisée avec gestion des rôles
$error = ''; // Variable for error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // CSRF token validation
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur CSRF, veuillez réessayer.");
    }

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Query the database for the user with the provided email
    $stmt = $pdo->prepare("SELECT id, email, password, role FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Check if user exists and if the password matches
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];

        // Redirect based on user role
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
            default:
                header("Location: ../pages/index.php"); // Default redirect
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
    <title>Zoo Arcadia - Connexion</title>
    <meta name="description" content="Connectez-vous pour accéder à votre espace personnel au Zoo Arcadia. Gérez vos réservations et vos préférences !">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/Activités.css">
</head>
<body>
    <?php include '../include/navbar.php'; ?>

    <!-- Section Connexion -->
    <section class="py-5">
        <div class="container">
            <br>
            <h2 class="text-center text-primary mb-4">Connectez-vous</h2>
            <!-- Display error message if login fails -->
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
            <?php endif; ?>

            <form action="" method="POST" class="bg-light p-4 rounded shadow">
                <!-- CSRF token hidden input field -->
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">

                <div class="mb-3">
                    <label for="email" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                    </div>
                    <a href="#" class="text-primary">Mot de passe oublié ?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Se connecter</button>
            </form>

            <p class="text-center mt-4">Pas encore inscrit ? <a href="#" class="text-primary">Créez un compte</a></p>
        </div>
    </section>

    <!-- Section Conseils de Sécurité -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Conseils de Sécurité</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Utilisez un mot de passe complexe et unique.</li>
                <li class="list-group-item">Ne partagez jamais vos identifiants de connexion.</li>
                <li class="list-group-item">Déconnectez-vous après avoir utilisé un appareil public.</li>
                <li class="list-group-item">Contactez notre support en cas de doute ou d'activité suspecte.</li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../include/footer.php'; ?>
</body>
</html>

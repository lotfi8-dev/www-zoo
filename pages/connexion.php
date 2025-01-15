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
            <h2 class="text-center text-primary mb-4"><br>Connectez-vous</h2>
            <form action="#" method="POST" class="bg-light p-4 rounded shadow">
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

<?php
session_start();
include 'include/db_connect.php'; // Assurez-vous que le chemin est correct

if (!isset($pdo)) {
    die('Erreur : Connexion à la base de données échouée.');
}

// Récupération des habitats
$query = "SELECT * FROM habitat";
$stmt = $pdo->prepare($query);
$stmt->execute();
$habitats = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Barre de navigation -->
    <?php include 'include/navbar.php'; ?>

    <!-- Section Héro -->
    <header class="hero-section">
        <div class="hero-overlay">
            <div class="hero-text">
                <h1>Bienvenue au Zoo Arcadia</h1>
                <p>Découvrez des habitats uniques et des animaux fascinants.</p>
                <a href="pages/reservation.php" class="btn btn-primary btn-lg">Réservez votre visite</a>
            </div>
        </div>
    </header>

    <!-- Section Habitats -->
    <section class="container py-5">
        <h2 class="text-center text-primary">Nos Habitats</h2>
        <div class="row g-4">
            <?php foreach ($habitats as $habitat): ?>
                <div class="col-md-4">
                    <div class="card habitat-card">
                        <img src="<?= $habitat['image'] ?>" class="card-img-top" alt="<?= $habitat['nom'] ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= htmlspecialchars($habitat['nom']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($habitat['description']) ?></p>
                            <a href="pages/habitats.php?id=<?= $habitat['id'] ?>" class="btn btn-outline-primary">Explorer</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Section Activités -->
    <section class="activities-section">
        <div class="container py-5">
            <h2 class="text-center text-light">Nos Activités</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card activity-card">
                        <img src="images/visite-guidee.jpg" class="card-img-top" alt="Visite Guidée">
                        <div class="card-body text-center">
                            <h5 class="card-title">Visite Guidée</h5>
                            <p class="card-text">Partez en expédition avec nos experts.</p>
                            <a href="pages/activites.php" class="btn btn-success">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card activity-card">
                        <img src="images/soiree-safari.jpg" class="card-img-top" alt="Soirée Safari">
                        <div class="card-body text-center">
                            <h5 class="card-title">Soirée Safari</h5>
                            <p class="card-text">Vivez une soirée immersive au cœur de la nature.</p>
                            <a href="pages/activites.php" class="btn btn-success">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Avis des visiteurs -->
    <section class="container py-5">
        <h2 class="text-center text-primary">Avis des Visiteurs</h2>
        <div class="row">
            <div class="col-md-6">
                <blockquote class="blockquote">
                    <p>"Une expérience inoubliable ! Des habitats magnifiques et des animaux en pleine forme."</p>
                    <footer class="blockquote-footer">Alice, Paris</footer>
                </blockquote>
            </div>
            <div class="col-md-6">
                <blockquote class="blockquote">
                    <p>"Un zoo bien entretenu et respectueux des animaux. On reviendra !"</p>
                    <footer class="blockquote-footer">Marc, Lyon</footer>
                </blockquote>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>

</body>
</html>

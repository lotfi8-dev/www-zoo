<?php
session_start();
include 'include/db_connect.php'; // Chemin mis à jour pour inclure le fichier de connexion

if (!isset($pdo)) {
    die('Database connection failed.');
}

// Récupération des données des habitats
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
    <link rel="stylesheet" href="/css/Activités.css">
</head>
<body>
    <!-- Barre de navigation -->
    <?php include 'include/navbar.php'; ?>

    <!-- Hero Section -->
    <header class="hero-section text-white text-center" style="background: url('/images/ZOoo.png') no-repeat center center / cover;">
        <div class="container">
            <h1 class="display-4">Bienvenue au Zoo Arcadia</h1>
            <p class="lead">Découvrez des habitats uniques et des animaux fascinants. Réservez dès maintenant !</p>
            <a href="/pages/reservation.php" class="btn btn-primary btn-lg mt-3">Réservez votre visite</a>
        </div>
    </header>

    <!-- Section Habitats -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Découvrez Nos Habitats</h2>
            <div class="row g-4">
                <?php foreach ($habitats as $habitat): ?>
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <img src="<?= $habitat['image'] ?>" class="card-img-top" alt="<?= $habitat['nom'] ?>">
                            <div class="card-body text-center">
                                <h5 class="card-title text-success"><?= $habitat['nom'] ?></h5>
                                <p class="card-text"><?= $habitat['description'] ?></p>
                                <a href="/include/habitat.php?id=<?= htmlspecialchars($habitat['id']) ?>" class="btn btn-outline-success">Explorer</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>

</body>
</html>

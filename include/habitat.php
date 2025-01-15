<?php
session_start();
include 'db_connect.php'; // Connexion à la base de données

// Vérification de l'ID de l'habitat passé dans l'URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Erreur : Aucun habitat spécifié ou ID invalide.");
}

$habitat_id = intval($_GET['id']);

// Vérification de la connexion à la base de données
if (!$pdo) {
    die("Erreur : Connexion à la base de données échouée.");
}

try {
    // Récupération des informations de l'habitat
    $query_habitat = "SELECT * FROM habitat WHERE id = :id";
    $stmt_habitat = $pdo->prepare($query_habitat);
    $stmt_habitat->bindParam(':id', $habitat_id, PDO::PARAM_INT);
    $stmt_habitat->execute();
    $habitat = $stmt_habitat->fetch(PDO::FETCH_ASSOC);

    if (!$habitat) {
        die("Erreur : Habitat non trouvé.");
    }
    // Récupération des animaux associés à cet habitat
    $query_animaux = "SELECT * FROM animal WHERE habitat_id = :id";
    $stmt_animaux = $pdo->prepare($query_animaux);
    $stmt_animaux->bindParam(':id', $habitat_id, PDO::PARAM_INT);
    $stmt_animaux->execute();
    $animaux = $stmt_animaux->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $habitat['nom'] ?> - Zoo Arcadia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/habitats.css">
</head>
<body>
    <!-- Navigation -->
    <?php include '../include/navbar.php'; ?>

    <!-- Section Habitat -->
    <div class="container my-5">
        <h1 class="text-center text-success"><?= $habitat['nom'] ?></h1>
        <p class="text-center"><?= $habitat['description'] ?></p>
        <div class="text-center mb-4">
            <img src="<?= $habitat['image'] ?>" class="img-fluid" alt="<?= $habitat['nom'] ?>" style="max-height: 400px;">
        </div>

        <h2 class="text-center text-success">Les Animaux de cet Habitat</h2>
        <div class="row g-4">
            <?php foreach ($animaux as $animal): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $animal['image'] ?>" class="card-img-top" alt="<?= $animal['nom'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $animal['nom'] ?></h5>
                            <p class="card-text"><?= $animal['description'] ?></p>
                            <p><strong>Nourriture :</strong> <?= $animal['alimentation'] ?></p>
                            <p><strong>Dernière visite vétérinaire :</strong> <?= $animal['derniere_visite'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../include/footer.php'; ?>
</body>
</html>

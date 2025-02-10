<?php
include_once(__DIR__ . '/../include/db_connect.php');

if (!$pdo) {
    die("Erreur : La connexion à la base de données a échoué.");
}

try {
    $stmt = $pdo->query("SELECT * FROM animaux");
    $animaux = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zones des Animaux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/Activités.css">
</head>
<body>
    <?php include_once(__DIR__ . '/../include/navbar.php'); ?>
    <div class="container">
        <h1>Zones des Animaux</h1>
        <p>Les photos des animaux ne peuvent pas être envoyées pour le moment.</p>
    </div>
    <div class="container">
        <h1>Liste des Animaux</h1>

        <?php if (!empty($animaux)) : ?>
            <div class="grid">
                <?php foreach ($animaux as $animal) : ?>
                    <div class="card">
                        <img src="../images/<?= htmlspecialchars($animal['image']) ?>" alt="<?= htmlspecialchars($animal['prenom']) ?>">
                        <h3><?= htmlspecialchars($animal['prenom']) ?></h3>
                        <p>Race : <?= htmlspecialchars($animal['race']) ?></p>
                        <p>Habitat : <?= htmlspecialchars($animal['habitat']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>Aucun animal trouvé.</p>
        <?php endif; ?>
    </div>

    <?php include_once(__DIR__ . '/../include/footer.php'); ?>
</body>
</html>

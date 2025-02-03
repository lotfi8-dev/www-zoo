<?php
session_start();
include '../includes/db_connect.php';

// Vérifier si un habitat est sélectionné
$habitat = isset($_GET['habitat']) ? $_GET['habitat'] : 'jungle';

// Récupérer les animaux en fonction de l'habitat sélectionné
$stmt = $pdo->prepare("SELECT * FROM animaux WHERE habitat = ?");
$stmt->execute([$habitat]);
$animaux = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitat - Zoo Arcadia</title>
    <link rel="stylesheet" href="../css/habitats.css">
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="container">
        <h2 class="text-center">Découvrir l'Habitat : <?php echo htmlspecialchars(ucfirst($habitat)); ?></h2>
        <div class="text-center mb-3">
            <a href="habitats.php?habitat=jungle" class="btn btn-success">Jungle</a>
            <a href="habitats.php?habitat=savane" class="btn btn-warning">Savane</a>
            <a href="habitats.php?habitat=marais" class="btn btn-primary">Marais</a>
            <a href="habitats.php?habitat=foret" class="btn btn-secondary">Forêt</a>
        </div>
        <div class="row">
            <?php foreach ($animaux as $animal): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <?php 
                        $imagePath = !empty($animal['image']) && file_exists("../images/" . $animal['image']) ? "../images/" . htmlspecialchars($animal['image']) : "../images/default.jpg"; 
                    ?>
                    <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($animal['nom']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($animal['nom']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($animal['description']); ?></p>
                        <p class="text-muted">Origine : <?php echo htmlspecialchars($animal['origine']); ?></p>
                        <p class="text-muted">Nombre de vues : <?php echo htmlspecialchars($animal['vues']); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>

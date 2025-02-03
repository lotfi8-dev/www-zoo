<?php
session_start();
include '../includes/db_connect.php';

// Vérifier si un ID d'animal est passé en paramètre
if (isset($_GET['id'])) {
    $animal_id = (int) $_GET['id'];
    
    // Incrémenter le compteur de vues
    $stmt = $pdo->prepare("UPDATE animaux SET vues = vues + 1 WHERE id = ?");
    $stmt->execute([$animal_id]);
    
    // Récupérer les détails de l'animal
    $stmt = $pdo->prepare("SELECT * FROM animaux WHERE id = ?");
    $stmt->execute([$animal_id]);
    $animal = $stmt->fetch();
}

// Récupération des avis validés avec date
$stmt = $pdo->query("SELECT pseudo, avis, date_submission FROM avis WHERE statut = 'validé' ORDER BY date_submission DESC LIMIT 10");
$avis_valides = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Zoo Arcadia</title>
    <link rel="stylesheet" href="../css/Activités.css">
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="container">
        <h2 class="text-center">Bienvenue au Zoo Arcadia</h2>
        <p class="text-center">Découvrez nos habitats, animaux et services.</p>
        
        <?php if (isset($animal)): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title text-center"><?php echo htmlspecialchars($animal['nom']); ?></h3>
                <p class="text-center">Nombre de vues : <?php echo $animal['vues']; ?></p>
                <p><?php echo htmlspecialchars($animal['description']); ?></p>
                <?php if (!empty($animal['image'])): ?>
                    <div class="text-center">
                        <img src="../images/<?php echo htmlspecialchars($animal['image']); ?>" alt="<?php echo htmlspecialchars($animal['nom']); ?>" class="img-fluid">
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        
        <h3 class="text-center">Avis des visiteurs</h3>
        <div class="row">
            <?php foreach ($avis_valides as $a): ?>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo htmlspecialchars($a['pseudo']); ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            Posté le <?php echo date('d/m/Y', strtotime($a['date_submission'])); ?>
                        </h6>
                        <p class="card-text">"<?php echo htmlspecialchars($a['avis']); ?>"</p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-3">
            <a href="avis.php" class="btn btn-primary">Laisser un avis</a>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>

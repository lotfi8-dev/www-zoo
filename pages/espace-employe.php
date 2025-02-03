<?php
session_start();
include '../includes/db_connect.php';

// Vérifier si l'utilisateur est bien employé
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'employe') {
    header("Location: ../connexion.php");
    exit();
}

// Récupération des avis en attente
$stmt = $pdo->query("SELECT id, pseudo, avis FROM avis WHERE statut = 'en attente'");
$avis = $stmt->fetchAll();

// Récupération des services
$stmt = $pdo->query("SELECT id, nom, description FROM services");
$services = $stmt->fetchAll();

// Validation des avis
if (isset($_POST['valider_avis'])) {
    $id_avis = $_POST['id_avis'];
    $stmt = $pdo->prepare("UPDATE avis SET statut = 'validé' WHERE id = ?");
    $stmt->execute([$id_avis]);
    header("Location: espace-employe.php");
    exit();
}

// Modification des services
if (isset($_POST['modifier_service'])) {
    $id_service = $_POST['id_service'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    
    $stmt = $pdo->prepare("UPDATE services SET nom = ?, description = ? WHERE id = ?");
    $stmt->execute([$nom, $description, $id_service]);
    header("Location: espace-employe.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Employé - Zoo Arcadia</title>
    <link rel="stylesheet" href="/css/employe.css">
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="container">
        <h2 class="text-center">Espace Employé</h2>
        
        <h3>Validation des avis visiteurs</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Avis</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($avis as $a): ?>
                <tr>
                    <td><?php echo htmlspecialchars($a['pseudo']); ?></td>
                    <td><?php echo htmlspecialchars($a['avis']); ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id_avis" value="<?php echo $a['id']; ?>">
                            <button type="submit" name="valider_avis" class="btn btn-success">Valider</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <h3>Modification des services</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $s): ?>
                <tr>
                    <form method="post">
                        <td><input type="text" name="nom" value="<?php echo htmlspecialchars($s['nom']); ?>" class="form-control"></td>
                        <td><input type="text" name="description" value="<?php echo htmlspecialchars($s['description']); ?>" class="form-control"></td>
                        <td>
                            <input type="hidden" name="id_service" value="<?php echo $s['id']; ?>">
                            <button type="submit" name="modifier_service" class="btn btn-warning">Modifier</button>
                        </td>
                    </form>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>

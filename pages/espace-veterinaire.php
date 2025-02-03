<?php
session_start();
include '../includes/db_connect.php';

// Vérifier si l'utilisateur est bien vétérinaire
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'veterinaire') {
    header("Location: ../connexion.php");
    exit();
}

// Récupération des animaux
$stmt = $pdo->query("SELECT id, nom, etat, derniere_visite FROM animaux");
$animaux = $stmt->fetchAll();

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $animal_id = $_POST['animal_id'];
    $etat = $_POST['etat'];
    $nourriture = $_POST['nourriture'];
    $grammage = $_POST['grammage'];
    $date = date('Y-m-d');
    
    $stmt = $pdo->prepare("INSERT INTO suivi_veterinaire (animal_id, etat, nourriture, grammage, date) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$animal_id, $etat, $nourriture, $grammage, $date]);
    header("Location: espace-veterinaire.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Vétérinaire - Zoo Arcadia</title>
    <link rel="stylesheet" href="/css/veterinaire.css">
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="container">
        <h2 class="text-center">Espace Vétérinaire</h2>
        <h3>Suivi des animaux</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>État</th>
                    <th>Dernière visite</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($animaux as $animal): ?>
                <tr>
                    <td><?php echo htmlspecialchars($animal['id']); ?></td>
                    <td><?php echo htmlspecialchars($animal['nom']); ?></td>
                    <td><?php echo htmlspecialchars($animal['etat']); ?></td>
                    <td><?php echo htmlspecialchars($animal['derniere_visite']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <h3>Ajouter un suivi vétérinaire</h3>
        <form method="post">
            <div class="mb-3">
                <label>Animal</label>
                <select name="animal_id" class="form-control" required>
                    <?php foreach ($animaux as $animal): ?>
                        <option value="<?php echo $animal['id']; ?>"><?php echo htmlspecialchars($animal['nom']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label>État</label>
                <input type="text" name="etat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nourriture</label>
                <input type="text" name="nourriture" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Grammage</label>
                <input type="number" name="grammage" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>

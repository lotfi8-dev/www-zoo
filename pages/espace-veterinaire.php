<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => 'localhost',  // Make sure to set this to your actual domain if needed
        'secure' => false,  // Set this to false as you're not using HTTPS
        'httponly' => true,  // Prevent JS access to cookies
        'samesite' => 'Strict'  // Protect from cross-site request attacks
    ]);
}
require '../include/db_connect.php'; // Connexion à la base de données

// Vérification de l'authentification (seuls les vétérinaires peuvent accéder)
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'vet') {
    header('Location: ../index.php');
    exit();
}

// Ajout compte rendu de santé
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter_compte_rendu'])) {
    $id_animal = $_POST['animal'];
    $etat_sante = $_POST['etat_sante'];
    $commentaire = $_POST['observations'];
    $created_by = $_SESSION['user_id'];

    $sql = "INSERT INTO comptes_rendus (id_animal, etat_sante, date, commentaire, created_by)
            VALUES (?, ?, NOW(), ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_animal, $etat_sante, $commentaire, $created_by]);
}

// Ajout avis sur un habitat
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter_avis'])) {
    $id_habitat = $_POST['habitat'];
    $commentaire = $_POST['commentaire'];

    $sql = "INSERT INTO review (pseudo, avis, created_at, is_approved)
            VALUES (?, ?, NOW(), FALSE)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_name'], $commentaire]);
}

// Récupérer la liste des animaux
$animals = $pdo->query("SELECT id, nom FROM animal ORDER BY nom")->fetchAll(PDO::FETCH_ASSOC);

// Récupérer la liste des habitats
$habitats = $pdo->query("SELECT id, nom FROM habitat ORDER BY nom")->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les comptes rendus existants
$comptes_rendus = $pdo->query("
    SELECT c.id, a.nom AS animal, c.etat_sante, c.date, c.commentaire, u.name AS veterinaire
    FROM comptes_rendus c
    JOIN animal a ON c.id_animal = a.id
    JOIN users u ON c.created_by = u.id
    ORDER BY c.date DESC
")->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les avis sur les habitats
$avis_habitats = $pdo->query("
    SELECT id, pseudo, avis, created_at, is_approved 
    FROM review 
    ORDER BY created_at DESC
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Vétérinaire - Zoo Arcadia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/espace-employe.css">
</head>
<body>
    <?php include '../include/navbar.php'; ?>

    <header class="bg-success text-white text-center py-3">
        <h1>Espace Vétérinaire</h1>
        <p>Gérez les comptes rendus de santé et les avis sur les habitats</p>
    </header>

    <main class="container py-5">
        <!-- Section Comptes Rendus de Santé -->
        <section class="mb-5">
            <h2 class="text-secondary">Comptes Rendus de Santé</h2>
            <form method="POST" class="mb-3">
                <div class="mb-3">
                    <label for="animal" class="form-label">Animal</label>
                    <select id="animal" name="animal" class="form-select">
                        <?php foreach ($animals as $animal): ?>
                            <option value="<?= $animal['id'] ?>"><?= htmlspecialchars($animal['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="etat_sante" class="form-label">État de Santé</label>
                    <input type="text" id="etat_sante" name="etat_sante" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="observations" class="form-label">Observations</label>
                    <textarea id="observations" name="observations" class="form-control" rows="4"></textarea>
                </div>
                <button type="submit" name="ajouter_compte_rendu" class="btn btn-success">Ajouter</button>
            </form>

            <!-- Affichage des comptes rendus -->
            <h3 class="text-secondary mt-4">Comptes Rendus Récents</h3>
            <ul class="list-group">
                <?php foreach ($comptes_rendus as $cr): ?>
                    <li class="list-group-item">
                        <strong><?= htmlspecialchars($cr['animal']) ?> :</strong>
                        <?= htmlspecialchars($cr['etat_sante']) ?> 
                        (<?= htmlspecialchars($cr['commentaire']) ?>)
                        <br><small>Ajouté par <?= htmlspecialchars($cr['veterinaire']) ?> le <?= $cr['date'] ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <!-- Section Avis sur les Habitats -->
        <section>
            <h2 class="text-secondary">Avis sur les Habitats</h2>
            <form method="POST" class="mb-3">
                <div class="mb-3">
                    <label for="habitat" class="form-label">Habitat</label>
                    <select id="habitat" name="habitat" class="form-select">
                        <?php foreach ($habitats as $habitat): ?>
                            <option value="<?= $habitat['id'] ?>"><?= htmlspecialchars($habitat['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="commentaire" class="form-label">Commentaire</label>
                    <textarea id="commentaire" name="commentaire" class="form-control" rows="4"></textarea>
                </div>
                <button type="submit" name="ajouter_avis" class="btn btn-success">Envoyer</button>
            </form>

            <!-- Affichage des avis -->
            <h3 class="text-secondary mt-4">Avis des Vétérinaires</h3>
            <ul class="list-group">
                <?php foreach ($avis_habitats as $avis): ?>
                    <li class="list-group-item">
                        <strong><?= htmlspecialchars($avis['pseudo']) ?> :</strong>
                        <?= htmlspecialchars($avis['avis']) ?>
                        <br><small>Posté le <?= $avis['created_at'] ?> <?= $avis['is_approved'] ? '(Validé)' : '(En attente de validation)' ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>

    <?php include '../include/footer.php'; ?>
</body>
</html>

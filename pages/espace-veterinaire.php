<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Vétérinaire - Zoo Arcadia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/espace-employe.css">
</head>
<body>
    <!-- Barre de navigation -->
    <?php include '../include/navbar.php'; ?>

    <!-- Header -->
    <header class="bg-success text-white text-center py-3">
        <h1>Espace Vétérinaire</h1>
        <p>Gérez les comptes rendus de santé et les avis sur les habitats</p>
    </header>

    <!-- Section Comptes Rendus de Santé -->
    <main class="container py-5">
        <section class="mb-5">
            <h2 class="text-secondary">Comptes Rendus de Santé</h2>
            <p>Ajoutez ou mettez à jour les informations sur la santé des animaux.</p>
            <form class="mb-3">
                <div class="mb-3">
                    <label for="animal" class="form-label">Animal</label>
                    <select id="animal" class="form-select">
                        <option value="lion">Lion</option>
                        <option value="girafe">Girafe</option>
                        <option value="elephant">Éléphant</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="etat" class="form-label">État de Santé</label>
                    <input type="text" id="etat" class="form-control" placeholder="Exemple : Bonne santé, Blessure légère">
                </div>
                <div class="mb-3">
                    <label for="observations" class="form-label">Observations</label>
                    <textarea id="observations" class="form-control" rows="4" placeholder="Ajoutez des détails..."></textarea>
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
            </form>
        </section>

        <!-- Section Avis sur les Habitats -->
        <section>
            <h2 class="text-secondary">Avis sur les Habitats</h2>
            <p>Donnez votre avis sur l'état des habitats pour améliorer les conditions des animaux.</p>
            <form class="mb-3">
                <div class="mb-3">
                    <label for="habitat" class="form-label">Habitat</label>
                    <select id="habitat" class="form-select">
                        <option value="savane">Savane</option>
                        <option value="jungle">Jungle</option>
                        <option value="marais">Marais</option>
                        <option value="foret">Forêt</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="commentaire" class="form-label">Commentaire</label>
                    <textarea id="commentaire" class="form-control" rows="4" placeholder="Ajoutez des suggestions ou observations..."></textarea>
                </div>
                <button type="submit" class="btn btn-success">Envoyer</button>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <?php include '../include/footer.php'; ?>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Employé - Zoo Arcadia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/espace-employe.css">
</head>
<body>
    <!-- Barre de navigation -->
    <?php include '../include/navbar.php'; ?>
    
    <!-- Header -->
    <header class="bg-primary text-white text-center py-3">
        <h1>Espace Employé</h1>
        <p>Gérez les avis des visiteurs et les informations sur la nourriture des animaux</p>
    </header>

    <!-- Section Gestion des Avis -->
    <main class="container py-5">
        <section class="mb-5">
            <h2 class="text-secondary">Gestion des Avis des Visiteurs</h2>
            <p>Validez ou invalidez les avis soumis par les visiteurs pour garantir leur pertinence.</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Auteur</th>
                        <th>Commentaire</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jean Dupont</td>
                        <td>Super visite, les animaux sont impressionnants !</td>
                        <td>01/01/2024</td>
                        <td>
                            <button class="btn btn-success">Valider</button>
                            <button class="btn btn-danger">Invalider</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Marie Curie</td>
                        <td>Un peu déçu par le manque d'activités.</td>
                        <td>02/01/2024</td>
                        <td>
                            <button class="btn btn-success">Valider</button>
                            <button class="btn btn-danger">Invalider</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Section Gestion de la Nourriture -->
        <section>
            <h2 class="text-secondary">Gestion de la Nourriture</h2>
            <p>Ajoutez des informations sur la nourriture donnée aux animaux.</p>
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
                    <label for="nourriture" class="form-label">Type de Nourriture</label>
                    <input type="text" id="nourriture" class="form-control" placeholder="Exemple : Viande, Herbes">
                </div>
                <div class="mb-3">
                    <label for="quantite" class="form-label">Quantité (en kg)</label>
                    <input type="number" id="quantite" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <?php include '../include/footer.php'; ?>
</body>
</html>